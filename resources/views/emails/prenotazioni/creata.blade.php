{{-- resources/views/emails/prenotazioni/creata.blade.php --}}
@component('mail::message')
# Nuova prenotazione

Utente: **{{ optional($p->user)->name ?? $p->nome }}**  
Giorno: **{{ \Illuminate\Support\Carbon::parse($p->giorno)->format('d/m/Y') }}**  
Orario: **{{ \Illuminate\Support\Carbon::createFromTimeString($p->orario)->format('H:i') }}**  
Posti: **{{ $p->posti }}**

@component('mail::button', ['url' => route('admin.prenotazioni.index')])
Vai all’elenco
@endcomponent
@endcomponent
