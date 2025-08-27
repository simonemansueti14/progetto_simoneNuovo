@component('mail::message')
# Prenotazione annullata

Ciao {{ $p->nome }},

ti informiamo che la tua prenotazione è stata annullata.

**Dettagli**
- Giorno: {{ \Illuminate\Support\Carbon::parse($p->giorno)->format('d/m/Y') }}
- Orario: {{ \Illuminate\Support\Carbon::createFromTimeString($p->orario)->format('H:i') }}
- Ospiti: {{ $p->posti }}
- Note: {{ $p->note ?? '—' }}

Se hai bisogno di assistenza, rispondi a questa email.

Grazie,  
{{ config('app.name') }}
@endcomponent
