@extends('layouts.master')
@section('title','Indicadores de Resultados')
@section('content')
@include('common.alerts')
@include('mir.modal')

<h1>MIR 
  <small class="text-muted">Listado</small>
  <a href="/mir/create" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Añadir</a>
</h1>

<div class="card">
    <div class="card-body">
      <table id="example" class="table table-hover">
        <thead>
        <tr>
          <th>Componente</th>
          <th>Objetivo</th>
          <th>Recursos federales</th>
          <th>Recursos propios</th>
          <th style="width: 15%;">Opciones</th>
        </tr>
        </thead>

        <tbody>
        @foreach($components as $component)
        <tr>
            <td>C{{$component->component}}</td>
            <td>{{$component->objective}}</td>
            <td>${{$component->fedresource}}</td>
            <td>${{$component->ownresource}}</td>
            <td >
                <div class="form-row">
                <form class="form-group" method="POST" action="/mir/{{$component->slug}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>&nbsp;&nbsp;

                <div class="form-group">
                <a class="btn btn-warning btn-sm" href="/mir/{{$component->slug}}/edit"><i class="fas fa-pen"></i></a>
                </div>&nbsp;&nbsp;

                <div class="form-group">
                <a class="btn btn-primary btn-sm" href="" data-target="#modal-components" data-toggle="modal" data-component="C{{$component->component}}" data-objective="{{$component->objective}}" data-fedre="${{$component->fedresource}}" data-ownre="${{$component->ownresource}}" data-tri="{{$component->trianual}}" data-one="{{$component->nineteen}}" data-two="{{$component->twenty}}" data-three="{{$component->twenty_one}}"><i class="fas fa-eye"></i></a>
                </div>

                </div>
            </td>
        </tr>
        @endforeach
        </tbody>

      </table>
    </div>
  </div>

@endsection
