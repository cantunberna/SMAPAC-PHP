
@extends('layouts.master')
@section('title', 'Crear Usuarios')
@section('content')
{{--  ['user' => new App\User]  --}}
<h1>Nuevo Usuario</h1>

{{-- @if ($errors->any())
    <div class="alert alert-danger text-center">
      <strong>Adventencia: </strong>Debe completar los siguientes campos
    </div>
@endif --}}

  <form action="{{route('users.store')}}" method="POST"  class="form-group" >

    @include('users.form', ['user'=> new App\User])

    <a href="/users" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i>&nbsp;Guardar</button>
  </form>
  <br>
@endsection
