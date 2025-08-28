@component('mail::message')
# Cancellazione prenotazione

Ciao {{ $p->nome }},

la tua prenotazione è stata **annullata dall’amministratore**.

- Giorno: {{ $p->giorno }}
- Orario: {{ $p->orario }}
- Posti: {{ $p->posti }}

Se hai domande puoi rispondere a questa email.

Grazie,  
Lo Staff
@endcomponent
