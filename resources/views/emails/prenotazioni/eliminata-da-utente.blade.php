@component('mail::message')
# Prenotazione eliminata dall’utente

L’utente **{{ $user->name }}** ({{ $user->email }}) ha **eliminato** la propria prenotazione.

**Dettagli prenotazione:**
- Giorno: {{ $p->giorno }}
- Orario: {{ $p->orario }}
- Posti: {{ $p->posti }}
- Nome inserito: {{ $p->nome }}
- Note: {{ $p->note ?? '—' }}
- Creata il: {{ optional($p->created_at)->format('d/m/Y H:i') }}

@component('mail::button', ['url' => route('admin.prenotazioni.index')])
Vai alle prenotazioni (Admin)
@endcomponent

Grazie,  
{{ config('app.name') }}
@endcomponent
