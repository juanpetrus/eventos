@extends('layouts.application')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Eventos</h1>
<p class="mb-4">Todos eventos que está relacionado a você.</p>

<div class="row">
  <div class="col-lg-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Eventos Conidado</h6>
      </div>
      <div class="card-body">
        <table class="table">
          <tr class="bg">
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data do Evento</th>
            <th>Ação</th>
          </tr>
          @foreach ($convites as $evento)
          <tr>
            <td>{{ $evento->nome }}</td>
            <td>{{ $evento->descricao }}</td>
            <td>{{ date('d/m/Y', strtotime($evento->data_evento)) }}</td>
            
            <td>
            @if($evento->data_evento > date('Y-m-d H:i:s'))
            <form action="{{route('eventos.destroy', $evento->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Cancelar</button>
            </form>
            @endif
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

    
  </div>
</div>
@endsection