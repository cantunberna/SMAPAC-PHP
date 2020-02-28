@extends('layouts.master')
@section('title', 'Proveedor')
@section('content')

<div class="card text-center col-md-6">
    <div class="card-header">
      <h3>Detalles del proveedor</h3>
    </div>
    <div class="card-body">
      <h5 class="card-text"><strong>ID:</strong> {{$proveedor->id}}</h5>
      <h5 class="card-text"><strong>Nombre:</strong> {{$proveedor->name}}</h5>
      <h5 class="card-text"><strong>RFC:</strong> {{$proveedor->rfc}}</h5>
      <h5 class="card-text"><strong>Dirección:</strong> {{$proveedor->direction}}</h5>
    </div>
    <div class="card-footer text-muted">
        <a href="/providers" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>&nbsp;Regresar</a>
    </div>
  </div>
@endsection
