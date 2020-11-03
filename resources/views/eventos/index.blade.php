@extends('layouts.application')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Eventos</h1>
<p class="mb-4">Todos eventos que você já criou.</p>

<div class="row">
  <div class="col-lg-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Meus Eventos
          <a href="{{ route('eventos.lixeira') }}" class="btn btn-sm btn-primary float-right">Lixeira</a>
        </h6>
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
            <form action="{{route('eventos.destroy', $evento->id)}}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
              <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

    
  </div>
</div>
@endsection