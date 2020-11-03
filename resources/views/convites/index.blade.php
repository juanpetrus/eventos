@extends('layouts.application')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Convites</h1>
<p class="mb-4">Todos os convites relaciondos a você.</p>

<div class="row">
  <div class="col-lg-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Meus Eventos</h6>
      </div>
      <div class="card-body">
        <table class="table">
          <tr>
            <th>Convite</th>
            <th colspan="2">Ação</th>
          </tr>
        
          @foreach ($convites as $convite)
          @if($convite->pivot->status == 0)
          <tr>
            <td>{{ $convite->nome }}</td>
            <td>
              <form action="{{route('convites.aceitar')}}" method="post">
                @csrf
                <input type="hidden" value="{{ $convite->pivot->id }}" name="convite_id">
                <button type="submit" class="btn btn-success">Aceitar</button>
              </form>
            </td>
              <td>
              <form action="{{route('convites.recusar')}}" method="post">
                @csrf
                <input type="hidden" value="{{ $convite->pivot->id }}" name="convite_id">
                <button type="submit" class="btn btn-danger">Recusar</button>
              </form>
            </td>
          </tr>
          @endif
          @endforeach

        </table>
      </div>
    </div>
  </div>
</div>
@endsection