<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountEliminatoMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user) {}

    public function build()
    {
        return $this->subject('Il tuo account è stato eliminato')
                    ->markdown('emails.users.account_eliminato', [
                        'u' => $this->user,
                    ]);
    }
}
