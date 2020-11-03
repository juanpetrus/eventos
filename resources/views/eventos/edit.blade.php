@extends('layouts.application')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Editando Eventos</h1>

<div class="row">
  <div class="col-lg-12">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Alterando Eventos</h6>
      </div>
      <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach   
        </div>
        @endif
        <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="nome">Nome do Evento:</label>
                <input type="text" class="form-control {{ ($errors->has('nome') ? 'is-invalid' : '') }}" name="nome" id="nome" value="{{$evento->nome}}" placeholder="Nome do seu evento">
                <div class="invalid-feedback">
                  {{ $errors->first('nome') }}
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="data_evento">Data do Evento:</label>
                <input type="date" class="form-control {{ ($errors->has('data_evento') ? 'is-invalid' : '') }}" name="data_evento" id="data_evento" value="{{ date('m-d-Y', strtotime($evento->data_evento)) }}">
                <div class="invalid-feedback">
                  {{ $errors->first('data_evento') }}
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control {{ ($errors->has('descricao') ? 'is-invalid' : '') }}" name="descricao" id="descricao" value="{{$evento->descricao}}" placeholder="Sua descrição do evento">
                <div class="invalid-feedback">
                  {{ $errors->first('descricao') }}
                </div>
              </div>
            </div>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection