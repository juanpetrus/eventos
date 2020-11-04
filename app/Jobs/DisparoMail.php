<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DisparoMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->replyTo($this->data['email'], $this->data['nome'])
                    ->to('juan.petruss@gmail.com', 'Juan')
                    ->from($this->data['email'], $this->data['nome'])
                    ->subject('Evento '.$this->data['nome'])
                    ->markdown('email.eventoMail',[
                        'nome' => $this->data['nome'],
                        'descricao' => $this->data['descricao'],
                        'data_evento' => $this->data['data_evento'],
                    ]);
    }
}
