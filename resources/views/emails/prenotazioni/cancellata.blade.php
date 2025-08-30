{{-- resources/views/emails/prenotazioni/cancellata.blade.php --}}
@component('mail::message')
# Prenotazione annullata

La tua prenotazione del **{{ \Illuminate\Support\Carbon::parse($p->giorno)->format('d/m/Y') }}**
alle **{{ \Illuminate\Support\Carbon::createFromTimeString($p->orario)->format('H:i') }}**
è stata annullata dallo staff.

Se hai bisogno di info, rispondi a questa email.
@endcomponent
