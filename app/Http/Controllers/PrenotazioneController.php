<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prenotazione;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Mail\PrenotazioneCancellataMail;
use App\Mail\PrenotazioneEliminataDaUtenteMail;
use Illuminate\View\View;


class PrenotazioneController extends Controller
{
    public function store(Request $request)
    {
        // Validazioni base
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
                    return $fail('Giorno non valido.');
                },
            ],
            // 👇 minimo 4 posti
            'posti'  => ['required','integer','min:4','max:50'],
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
        $prenotazioni = Prenotazione::query()
            ->orderByDesc('giorno')
            ->orderBy('orario')
            ->paginate(20);

        return view('admin.prenotazioni.index', compact('prenotazioni'));
    }

    public function destroy(Prenotazione $prenotazione)
    {
        $email = optional($prenotazione->user)->email;

        // invio email PRIMA di cancellare
        if ($email) {
            Mail::to($email)->send(new PrenotazioneCancellataMail($prenotazione));
        }

        $prenotazione->delete();

        return back()->with(
            'success',
            'Prenotazione eliminata con successo.' .
            ($email ? ' È stata inviata una email di notifica.' : ' (Nessuna email inviata: prenotazione senza utente collegato)')
        );
    }

    public function mie(): View
    {
        $userId = Auth::id(); // evita l’avviso di intelephense

        $prenotazioni = Prenotazione::where('user_id', $userId)
            ->orderByDesc('giorno')
            ->orderBy('orario')
            ->paginate(10);

        return view('prenotazioni.mie', compact('prenotazioni'));
    }

   public function destroyMine(\App\Models\Prenotazione $prenotazione): \Illuminate\Http\RedirectResponse
    {
        // Solo il proprietario può cancellare la propria prenotazione
        if ($prenotazione->user_id !== Auth::id()) {
            abort(403, 'Non autorizzato.');
        }

        // Recupera tutti gli admin
        $admins = \App\Models\User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            if ($admin->email) {
                Mail::to($admin->email)->send(new PrenotazioneCancellataMail($prenotazione));
            }
        }

        // Cancella la prenotazione
        $prenotazione->delete();

        return back()->with(
            'success',
            'Prenotazione annullata. Gli admin sono stati avvisati.'
        );
    }




    
}
