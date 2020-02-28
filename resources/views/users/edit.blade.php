@extends('layouts.master')
@section('title', 'Editar Usuarios')
@section('content')

<h1>Editar Usuario</h1>

    @if (session()->has('infor'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

<form action="/users/{{$user->id}}" method="POST" class="form-group">
    @method('PUT')
    @include('users.form')
    {{--  <div class="form-row">

      <div class="form-group col-md-6">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control" id="name" value="">


      </div>
      <div class="form-group col-md-6">
        <label for="">Correo</label>
        <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">


      </div>
      <div class="form-group col-md-12">
        <label for="">Roles</label>

          @foreach ($roles as $id => $name)
            <input type="checkbox"
            name="roles[]"
            value="{{ $id  }}"
            {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
            > {{ $name   }}
          @endforeach

      </div>

    </div>  --}}

    <a href="/coordinations" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
</form>


@endsection
