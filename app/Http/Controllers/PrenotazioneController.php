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
use App\Mail\PrenotazioneCreataMail;
use Illuminate\View\View;

class PrenotazioneController extends Controller
{
    public function store(Request $request)
    {
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
                    if ($day->isTuesday() || $day->isWednesday() || $day->isThursday()) {
                        $min = Carbon::createFromTimeString('18:00');
                        $max = Carbon::createFromTimeString('22:00');
                        if ($t->lt($min) || $t->gt($max)) {
                            return $fail('Orario non valido per il giorno selezionato (mar-gio: 18:00–22:00).');
                        }
                        return;
                    }
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
            'posti'  => ['required','integer','min:4','max:50'],
            'note'   => ['nullable','string','max:255'],
        ]);

        $prenotazione = Prenotazione::create([
            'giorno'  => $request->giorno,
            'orario'  => $request->orario,
            'posti'   => $request->posti,
            'nome'    => Auth::user()->name,
            'note'    => $request->note,
            'user_id' => Auth::id(),
        ]);

        // NOTIFICA AGLI ADMIN per nuova prenotazione
        $adminEmails = $this->adminEmails(); // array di email admin
        if (!empty($adminEmails)) {
            Mail::to($adminEmails)->send(new PrenotazioneCreataMail($prenotazione));
        }

        return redirect()
            ->route('prenotazioni')
            ->with('success', 'Prenotazione salvata con successo!');
    }

    public function index()
    {
        $prenotazioni = Prenotazione::query()
            ->orderByDesc('giorno')
            ->orderBy('orario')
            ->paginate(20);

        return view('admin.prenotazioni.index', compact('prenotazioni'));
    }

    // Eliminazione da parte dell'ADMIN: mail SOLO all'utente
    public function destroy(Prenotazione $prenotazione)
    {
        $email = optional($prenotazione->user)->email;

        if ($email) {
            Mail::to($email)->send(new PrenotazioneCancellataMail($prenotazione));
        }

        $prenotazione->delete();

        return back()->with(
            'success',
            'Prenotazione eliminata con successo.' .
            ($email ? ' È stata inviata una email di notifica all’utente.' : ' (Nessuna email inviata: prenotazione senza utente collegato)')
        );
    }

   
    public function mie(): View
    {
        $userId = Auth::id();

        $prenotazioni = Prenotazione::where('user_id', $userId)
            ->orderByDesc('giorno')
            ->orderBy('orario')
            ->paginate(10);

        return view('prenotazioni.mie', compact('prenotazioni'));
    }

    // Eliminazione da parte dell’UTENTE: mail AGLI ADMIN
    public function destroyMine(Prenotazione $prenotazione)
    {
        if ($prenotazione->user_id !== Auth::id()) {
            abort(403, 'Non autorizzato.');
        }

        $admins = $this->adminEmails();

        if (!empty($admins)) {
            Mail::to($admins)->send(new PrenotazioneEliminataDaUtenteMail(
                $prenotazione,
                Auth::user()
            ));
        }

        $prenotazione->delete();

        return back()->with('success', 'Prenotazione annullata. Gli admin sono stati avvisati.');
    }

    private function adminEmails(): array
    {
        return User::where('role', 'admin')->pluck('email')->filter()->all();
    }
}
