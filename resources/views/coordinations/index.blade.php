@extends('layouts.master')
@section('title','Lista de coordinación')
@section('content')
@include('common.alerts')

<h1>Coordinaciones
  <small class="text-muted">Listado</small>
  @if(auth()->user()->isAdmin())
  <a href="{{ route('coordinations.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Añadir</a>
  @endif
</h1>

<div class="card">
    <div class="card-body">
        <table id="example" class="table table-hover">
          <thead>
          <tr>
            <th>ID</th>
            <th>Coordinador</th>
            <th>Nombre Coordinacion</th>
            <th>Departamentos</th>
            <th>Opciones</th>
          </tr>
          </thead>

          <tbody>
@foreach ($coordinaciones as $coord)
          <tr>
              <td>{{$coord->slug}}</td>
                    <td>{{$coord->user->profession}}. {{$coord->user->name}} {{$coord->user->paterno}} {{$coord->user->materno}}</td>
              <td>{{$coord->name}}</td>
              {{-- <td>
                @foreach ($coord->departments as $departments)
                      <li> {{$departments->name}}</li>
                   @endforeach
       {{-- <li> {{ $coord->departments->pluck('name')->implode(',') }}</li> --}}
               {{-- </td> --}}
              <td>
                  @foreach ($coord->departments as $depart)
                      <li> {{$depart->name}}</li>
                  @endforeach
              </td>
              <td>

              <div class="form-row">
              <form class="form-group" method="POST" action="/coordinations/{{$coord->slug}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
              </form>&nbsp;&nbsp;

              <div class="form-group">
              <a class="btn btn-warning btn-sm" href="/coordinations/{{$coord->slug}}/edit"><i class="fas fa-pen"></i></a>
              </div>&nbsp;&nbsp;

              <div class="form-group">
              <a class="btn btn-primary btn-sm" href="/coordinations/{{$coord->slug}}"><i class="fas fa-eye"></i></a>
              </div>

                </div>
              </td>
          </tr>  @endforeach

          </tbody>
        </table>
      </div>
  </div>

@endsection
