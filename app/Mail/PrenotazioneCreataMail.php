<?php

namespace App\Mail;

use App\Models\Prenotazione;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrenotazioneCreataMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Prenotazione $prenotazione) {}

    public function build()
    {
        return $this->subject('Nuova prenotazione ricevuta')
            ->markdown('emails.prenotazioni.creata', [
                'p' => $this->prenotazione,
            ]);
    }
}
