<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $detalhes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detalhes)
    {
        $this->detalhes = $detalhes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $assunto = "Nova mensagem recebida pelo site :-)";
        return $this->from($this->detalhes['email'])
        ->subject($assunto)
        ->view('emails.contato')
        ->with([
            'mail' => $this->detalhes,
        ]);
    }
}
