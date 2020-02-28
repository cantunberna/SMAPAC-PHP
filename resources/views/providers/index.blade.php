@extends('layouts.master')
@section('title', 'Proveedores')
@section('content')
@include('common.alerts')

<h1>Proveedores
  <small class="text-muted">Listado</small>
  <a href="/providers/create" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Añadir</a>
</h1>

<div class="card">
    <div class="card-body">
        <table id="example" class="table table-hover">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Opciones</th>
          </tr>
          </thead>

          <tbody>
          @forelse ($proveedores as $prov)
          <tr>

              <td>{{$prov->id}}</td>
              <td>{{$prov->name}}</td>
              <td>{{$prov->rfc}}</td>
              <td>{{$prov->address}}</td>
              <td>{{$prov->telephone}}</td>
              <td>

              <div class="form-row">
              <form class="form-group" method="POST" action="/providers/{{$prov->slug}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
              </form>&nbsp;&nbsp;

              <div class="form-group">
              <a class="btn btn-warning btn-sm" href="/providers/{{$prov->slug}}/edit"><i class="fas fa-pen"></i></a>
              </div>&nbsp;&nbsp;

              <div class="form-group">
              <a class="btn btn-primary btn-sm" href="/providers/{{$prov->slug}}"><i class="fas fa-eye"></i></a>
              </div>
              </div>
              </td>
          </tr>
          @empty
          <div class="alert alert-warning d-sm-flex" role="alert">
              <strong>  No existe ningun registro </strong>
          </div>
          @endforelse
          </tbody>
        </table>
      </div>

  </div>

@endsection
