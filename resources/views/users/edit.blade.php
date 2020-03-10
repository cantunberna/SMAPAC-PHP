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
    <a href="{{ url()->previous() }}" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;
    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>&nbsp;Actualizar</button>
</form>


@endsection
