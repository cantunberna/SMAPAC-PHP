@extends('layouts.master')
@section('title','Editar Componente MIR')
@section('content')

<h1>MIR <small class="text-muted">Editar Componente</small></h1>

  <form action="/mir/{{$component->slug}}" method="POST" class="form-group">
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="">Componente</label>
      <input type="text" name="component" class="form-control" id="component" value="{{$component->component}}">

      </div>
      <div class="form-group col-md-10">
        <label for="">Objetivo</label>
      <textarea class="form-control" name="objective" id="objective" rows="2">{{$component->objective}}</textarea>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="">Recursos Federales</label>
        <input type="text" name="fedresource" class="form-control" id="number" value="{{$component->fedresource}}">

      </div>
      <div class="form-group col-md-3">
        <label for="">Recursos Propios</label>
        <input type="text" name="ownresource" class="form-control" id="number2" value="{{$component->ownresource}}">

      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="">Trianual</label>
        <input type="text" name="trianual" class="form-control" id="trianual" value="{{$component->trianual}}">

      </div>
      <div class="form-group col-md-2">
        <label for="">2019</label>
        <input type="text" name="nineteen" class="form-control" id="fist_year" value="{{$component->nineteen}}">

      </div>
      <div class="form-group col-md-2">
          <label for="">2020</label>
          <input type="text" name="twenty" class="form-control" id="second_year" value="{{$component->twenty}}">
      </div>
      <div class="form-group col-md-2">
          <label for="">2021</label>
          <input type="text" name="twenty_one" class="form-control" id="third_year" value="{{$component->twenty_one}}">
      </div>
    </div>

    <a href="/mir" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
  </form>

@endsection
