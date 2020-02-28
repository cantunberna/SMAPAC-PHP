@extends('layouts.master')
@section('title', 'Crear Responsabilidades')
@section('content')


<form action="{{route('levels.store')}}" method="POST" class="form-group">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Abreviación</label>
        <input type="text" name="name" class="form-control" id="code" value="{{ old('name')}}">

        @if ($errors->has('name'))
         <p style="color:red">  {{$errors->first('name')}} </p>
        @endif
      </div>
      <div class="form-group col-md-8">
        <label for="">Nombre</label>
        <input type="text" name="display_name" class="form-control" id="name" value="{{ old('display_name')}}">

        @if ($errors->has('display_name'))
         <p style="color:red">  {{$errors->first('display_name')}} </p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="">Descripcion</label>
      <textarea class="form-control" name="description" id="description">{{ old('description')}}</textarea>
      @if ($errors->has('description'))
         <p style="color:red">  {{$errors->first('description')}} </p>
        @endif
    </div>

    <a href="/res" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i>&nbsp;Guardar</button>
  </form>


@endsection
