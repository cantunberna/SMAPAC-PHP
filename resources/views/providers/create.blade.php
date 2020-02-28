@extends('layouts.master')
@section('title', 'Crear Proveedor')
@section('content')

<h1>Nuevo Proveedor</h1>

@if ($errors->any())
    <div class="alert alert-danger text-center">
      <strong>Adventencia: </strong>Debe completar los siguientes campos
    </div>
@endif

  <form action="/providers" method="POST" class="form-group">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control" id="code" value="{{ old('name')}}">

        @if ($errors->has('name'))
         <p style="color:red">  {{$errors->first('name')}} </p>
        @endif
      </div>
      <div class="form-group col-md-4">
        <label for="">RFC</label>
        <input type="text" name="rfc" class="form-control" id="name" value="{{ old('rfc')}}">

        @if ($errors->has('rfc'))
         <p style="color:red">  {{$errors->first('rfc')}} </p>
        @endif
      </div>
        <div class="form-group col-md-4">
            <label for="">Telefono</label>
            <input type="text" name="telephone" class="form-control" id="name" value="{{ old('telephone')}}">

            @if ($errors->has('telephone'))
                <p style="color:red">  {{$errors->first('telephone')}} </p>
            @endif
        </div>
    </div>

    <div class="form-group">
      <label for="">Dirección</label>
      <textarea class="form-control" name="address" id="description">{{ old('address')}}</textarea>
      @if ($errors->has('address'))
         <p style="color:red">  {{$errors->first('address')}} </p>
        @endif
    </div>

    <a href="/providers" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i>&nbsp;Guardar</button>
  </form>

@endsection
