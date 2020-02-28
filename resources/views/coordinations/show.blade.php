@extends('layouts.master')
@section('title','Coordinación')
@section('content')

<div class="card text-center col-md-6">
    <div class="card-header">
      <h3>Detalles de la coordinación</h3>
    </div>
    <div class="card-body">
      <h5 class="card-text"><strong>ID:</strong> {{$coordinacion->id}}</h5>
      <h5 class="card-text"><strong>Nombre:</strong> {{$coordinacion->name}}</h5>

    </div>
    <div class="card-footer text-muted">
        <a href="/coordinations" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>&nbsp;Regresar</a>
    </div>
  </div>

@endsection

