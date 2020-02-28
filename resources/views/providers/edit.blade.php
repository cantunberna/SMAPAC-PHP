@extends('layouts.master')
@section('title','Editar Proovedor')
@section('content')

<h1>Editar Proveedor</h1>

@if ($errors->any())
    <div class="alert alert-danger text-center">
      <strong>Adventencia: </strong>Debe completar los siguientes campos
            {{-- @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach --}}
    </div>
@endif

<form action="/providers/{{$proveedor->slug}}" method="POST" class="form-group">
    @method('PUT')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{$proveedor->name}}">

        @if ($errors->has('name'))
         <p style="color:red">  {{$errors->first('name')}} </p>
        @endif
      </div>
      <div class="form-group col-md-4">
        <label for="">RFC</label>
        <input type="text" name="rfc" class="form-control"  value="{{$proveedor->rfc}}">

        @if ($errors->has('rfc'))
         <p style="color:red">  {{$errors->first('rfc')}} </p>
        @endif
      </div>
  
    <div class="form-group col-md-4">
        <label for="">Telefono</label>
        <input type="text" name="telephone" class="form-control" id="telephone" value="{{$proveedor->telephone}}">

        @if ($errors->has('telephone'))
            <p style="color:red">  {{$errors->first('telephone')}} </p>
        @endif
    </div>
    </div>
    <div class="form-group">
      <label for="">Dirección</label>
      <textarea class="form-control" name="direction" id="description">{{$proveedor->address}}</textarea>
      @if ($errors->has('address'))
         <p style="color:red">  {{$errors->first('address')}} </p>
        @endif
    </div>
  
    <a href="/providers" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
  </form>

@endsection
