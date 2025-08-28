<?php

namespace App\Mail;

use App\Models\Prenotazione;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrenotazioneEliminataDaUtenteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Prenotazione $prenotazione,
        public User $utenteCheHaCancellato
    ) {}

    public function build()
    {
        return $this->subject('Notifica: prenotazione eliminata dall’utente')
            ->markdown('emails.prenotazioni.eliminata-da-utente', [
                'p'      => $this->prenotazione,
                'user'   => $this->utenteCheHaCancellato,
            ]);
    }
}
