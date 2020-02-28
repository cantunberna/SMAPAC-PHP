@extends('layouts.master')
@section('title','Departamento')
@section('content')

<div class="card text-center col-md-6">
    <div class="card-header">
      <h3>Detalles del departamento</h3>
    </div>
    <div class="card-body">
      <h5 class="card-text"><strong>ID:</strong> {{$departamento->id}}</h5>
      <h5 class="card-text"><strong>Nombre:</strong> {{$departamento->name}}</h5>
      <h5 class="card-text"><strong>Coordinación:</strong></h5>

    </div>
    <div class="card-footer text-muted">
        <a href="/departments" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>&nbsp;Regresar</a>
    </div>
  </div>

@endsection
