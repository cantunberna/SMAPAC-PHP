@extends('layouts.master')
@section('title','Editar Departamento')
@section('content')

<h1>Editar Departamento</h1>

@if ($errors->any())
    <div class="alert alert-danger text-center">
      <strong>Adventencia: </strong>Debe completar los siguientes campos
            {{-- @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach --}}
    </div>
@endif

<form action="/departments/{{$departamento->slug}}" method="POST" class="form-group">
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control" id="amount" value="{{$departamento->name}}">

        @if ($errors->has('amount'))
         <p style="color:red">  {{$errors->first('amount')}} </p>
        @endif
      </div>
      {{-- <div class="form-group col-md-4">
        <label for="">Coordinación</label>
        <select id="inputState" class="form-control">
          <option selected disabled>Elige una opción</option>
          <option>Opcion 1</option>
          <option>Opcion 2</option>
        </select>
      </div> --}}
    </div>

    <a href="/departments" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
  </form>

@endsection
