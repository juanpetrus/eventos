<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventoRestauradoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->data['email'], $this->data['email'])
        ->to('juan.petruss@gmail.com', 'Juan')
        ->from($this->data['email'], $this->data['nome'])
        ->subject('Evento Revogada - '.$this->data['evento'])
        ->markdown('email.eventoRestauradoMail',[
            'nome' => $this->data['nome'],
            'email' => $this->data['email'],
            'evento' => $this->data['evento'],
            'data_evento' => $this->data['data_evento'],
        ]);
    }
}
