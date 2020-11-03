@component('mail::message')
Olá, você criou um novo evento chamado "{{ $nome }}"

Dia do Evento: {{ $data_evento }}

@component('mail::panel')
  {{ $descricao }}
@endcomponent

@component('mail::button', ['url' => ''])
Visualizar Evento
@endcomponent

@endcomponent
