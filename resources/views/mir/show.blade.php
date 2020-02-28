@extends('layouts.master')
@section('title', 'MIR')
@section('content')

<div class="card text-center col-md-6">
    <div class="card-header">
        <h3>Detalles del Componente MIR C{{$component->component}}</h3>
    </div>
    <div class="card-body">
      <h5 class="card-text"><strong>Componente:</strong> <small class="text-muted">C{{$component->component}}</small></h5>
      <h5 class="card-text"><strong>Objetivo:</strong> <small class="text-muted"> {{$component->objective}}</small></h5>
      <h5 class="card-text"><strong>Recursos federales:</strong> <small class="text-muted">${{$component->fedresource}}</small></h5>
      <h5 class="card-text"><strong>Recursos propios:</strong> <small class="text-muted">${{$component->ownresource}}</small></h5>
    </div>
    <div class="card-footer text-muted">
        <a href="/mir" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>&nbsp;Regresar</a>
    </div>
  </div>

@endsection
