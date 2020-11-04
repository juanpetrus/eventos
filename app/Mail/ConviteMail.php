<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConviteMail extends Mailable
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
        return $this->replyTo($this->data['email'], $this->data['convidado'])
                    ->to($this->data['email_criador'], $this->data['criador'])
                    ->from($this->data['email'], $this->data['convidado'])
                    ->subject('EVENTO: Convite - '.$this->data['nome'])
                    ->markdown('email.ConviteMail',[
                        'nome' => $this->data['nome'],
                        'descricao' => $this->data['descricao'],
                        'data_evento' => $this->data['data_evento'],
                        'criador' => $this->data['criador'],
                        'convidado' => $this->data['convidado'],
                        'email' => $this->data['email'],
                    ]);
    }
}
