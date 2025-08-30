{{-- resources/views/emails/prenotazioni/eliminata-da-utente.blade.php --}}
@component('mail::message')
# Prenotazione eliminata dall’utente

L’utente **{{ $user->name }} ({{ $user->email }})** ha annullato una prenotazione:

- Giorno: **{{ \Illuminate\Support\Carbon::parse($p->giorno)->format('d/m/Y') }}**  
- Orario: **{{ \Illuminate\Support\Carbon::createFromTimeString($p->orario)->format('H:i') }}**  
- Posti: **{{ $p->posti }}**

@component('mail::button', ['url' => route('admin.prenotazioni.index')])
Apri prenotazioni
@endcomponent
@endcomponent
