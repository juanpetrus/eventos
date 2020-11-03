<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventoMail extends Mailable
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
        return $this->replyTo('juan.petruss@gmail.com', 'Juan')
                    ->to('juan.petruss@gmail.com', 'Juan')
                    ->from($this->data['email'], $this->data['convidado'])
                    ->subject('Evento '.$this->data['nome'])
                    ->markdown('email.eventoMail',[
                        'nome' => $this->data['nome'],
                        'descricao' => $this->data['descricao'],
                        'data_evento' => $this->data['data_evento'],
                        'convidado' => $this->data['convidado'],
                        'email' => $this->data['email'],
                    ]);
    }
}
