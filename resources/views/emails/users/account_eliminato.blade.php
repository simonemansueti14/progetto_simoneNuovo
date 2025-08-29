@component('mail::message')
# Ciao {{ $u->name }},

ti informiamo che il tuo account registrato con **{{ $u->email }}** è stato eliminato da un amministratore.

Se pensi si tratti di un errore, rispondi a questa email.

Grazie,  
{{ config('app.name') }}
@endcomponent
