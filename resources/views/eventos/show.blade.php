@extends('layouts.application')

@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ $evento->nome }}</h1>
<p class="mb-4">Criado em {{date('d/m/Y H:i', strtotime($evento->created_at))}} por {{ $evento->user->name }}.</p>

<div class="row">
  <div class="col-lg-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dia do Evento: {{ date('d/m/Y H:i', strtotime($evento->data_evento)) }}</h6>
      </div>
      <div class="card-body">
        <p>
        Nome do Evento: {{ $evento->nome }}<br>
        Descricao do Evento:{{ $evento->descricao }}<br>
        Total de participantes: {{ $evento->convites->count() }}<br>
        </p>

        <h2>Participantes</h2>
        @foreach($evento->convites as $convidado)
          <p>{{$convidado['name']}} - Status {{ $convidado->pivot->status }}</p>
        @endforeach

        <a href="#" data-toggle="modal" data-target="#convideModal" class="btn btn-success">Convidar</a><br>
      </div>
    </div>
  </div>
</div>


  <!-- Logout Modal-->
  <div class="modal fade" id="convideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja convidar alguem?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('convite') }}" method="post">
            @csrf
            <input type="hidden" name="evento_id" value="{{$evento->id}}">
            <select name="user_id" class="form-control">
              <option value="">Selecione Convidado</option>
              @foreach($participantes as $participante)
              <option value="{{$participante->id}}">{{$participante->name}}</option>
              @endforeach
            </select>
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection