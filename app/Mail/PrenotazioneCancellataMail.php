<?php

namespace App\Mail;

use App\Models\Prenotazione;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrenotazioneCancellataMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Prenotazione $prenotazione) {}

    public function build()
    {
        return $this->subject('La tua prenotazione è stata annullata')
                    ->markdown('emails.prenotazioni.cancellata', [
                        'p' => $this->prenotazione,
                    ]);
    }
}
