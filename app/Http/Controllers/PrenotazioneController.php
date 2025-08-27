<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prenotazione;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Mail\PrenotazioneCancellataMail;


class PrenotazioneController extends Controller
{
    public function store(Request $request)
    {
        // Validazioni base (puoi raffinare in futuro)
        $request->validate([
          'giorno' => [
              'required','date','after_or_equal:today',
              function ($attribute, $value, $fail) {
                  if (Carbon::parse($value)->isMonday()) {
                      $fail('Il lunedì non è selezionabile.');
                  }
              },
          ],
          'orario' => [
              'required','date_format:H:i',
              function ($attribute, $value, $fail) use ($request) {
                  try {
                      $day = Carbon::parse($request->input('giorno'));
                  } catch (\Exception $e) {
                      return $fail('Giorno non valido.');
                  }

                  $t = Carbon::createFromFormat('H:i', $value);
                  // mar(2)-gio(4): 18:00-22:00
                  if ($day->isTuesday() || $day->isWednesday() || $day->isThursday()) {
                      $min = Carbon::createFromTimeString('18:00');
                      $max = Carbon::createFromTimeString('22:00');
                      if ($t->lt($min) || $t->gt($max)) {
                          return $fail('Orario non valido per il giorno selezionato (mar-gio: 18:00–22:00).');
                      }
                      return;
                  }
                  // ven(5)-dom(0): 16:00-22:00
                  if ($day->isFriday() || $day->isSaturday() || $day->isSunday()) {
                      $min = Carbon::createFromTimeString('16:00');
                      $max = Carbon::createFromTimeString('22:00');
                      if ($t->lt($min) || $t->gt($max)) {
                          return $fail('Orario non valido per il giorno selezionato (ven-dom: 16:00–22:00).');
                      }
                      return;
                  }
                  // lunedì già bloccato sopra; se arriva qui è un giorno imprevisto
                  return $fail('Giorno non valido.');
              },
          ],
          'posti'  => ['required','integer','min:1','max:50'],
          'note'   => ['nullable','string','max:255'],
      ]);

        Prenotazione::create([
            'giorno'  => $request->giorno,
            'orario'  => $request->orario,
            'posti'   => $request->posti,
            'nome'    => Auth::user()->name,
            'note'    => $request->note,
            'user_id' => Auth::id(),
        ]);

        return redirect()
            ->route('prenotazioni')
            ->with('success', 'Prenotazione salvata con successo!');
    }

    public function index()
    {
        // ordino prima per giorno, poi per orario
        $prenotazioni = \App\Models\Prenotazione::query()
            ->orderByDesc('giorno')
            ->orderBy('orario')
            ->paginate(20); // pagina da 20

        return view('admin.prenotazioni.index', compact('prenotazioni'));
    }

    public function destroy(Prenotazione $prenotazione)
    {
        // Prendiamo l'email dell'utente, se disponibile
        $email = optional($prenotazione->user)->email;

        // Invia la mail PRIMA di cancellare (così hai ancora tutti i dati nel mailable)
        if ($email) {
            Mail::to($email)->send(new PrenotazioneCancellataMail($prenotazione));
        }

        $prenotazione->delete();

        return back()->with('success', 'Prenotazione eliminata con successo.'
            . ($email ? ' È stata inviata una email di notifica.' : ' (Nessuna email inviata: prenotazione senza utente collegato)'));
    }


}
