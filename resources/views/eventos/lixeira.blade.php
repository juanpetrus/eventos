@extends('layouts.application')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Eventos Cancelados</h1>
<p class="mb-4">Todos eventos que você já criou.</p>

<div class="row">
  <div class="col-lg-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Meus Eventos Cancelados</h6>
      </div>
      <div class="card-body">
        <table class="table">
          <tr class="bg">
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data do Evento</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
          @foreach ($eventos as $evento)
          <tr>
            <td>{{ $evento->nome }}</td>
            <td>{{ $evento->descricao }}</td>
            <td>{{ date('d/m/Y', strtotime($evento->data_evento)) }}</td>
            <td>Ativo</td>
            <td>
              <a href="{{ route('eventos.restaurar', $evento->id) }}" class="btn btn-primary">Restaurar</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

    
  </div>
</div>
@endsection