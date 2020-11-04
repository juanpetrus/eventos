@component('mail::message')
Olá, {{ $convidado }}! você foi convidado para um evento chamado "{{ $nome }}"!
Evento Criador por {{ $criador }}.

Dia do Evento: {{ $data_evento }}

@component('mail::panel')
  {{ $descricao }}
@endcomponent

@component('mail::button', ['url' => ''])
Visualizar Evento
@endcomponent

@endcomponent