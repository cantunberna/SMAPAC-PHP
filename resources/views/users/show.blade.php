@extends('layouts.master')
@section('title', 'Vista')
@section('content')
<style>
    h1
    {
        text-transform:  uppercase;
    }
</style>
<div class="container" >
    <h1>@foreach ($user->roles as $role)
      {{ $role->display_name }}
    @endforeach</h1> <br>
    <div class="container">
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{ $user->name }} {{  $user->paterno }} {{ $user->materno }}</td>
        </tr>
        <tr>
            <th>Curp:</th>
            <td>{{ $user->curp  }}</td>
            <th>RFC:</th>
            <td>{{ $user->rfc }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
            <th>Telefono:</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td>{{ $user->birthday }}</td>
            <th>Genero</th>
            <td>{{ $user->gender }}</td>
        </tr>
        <tr>
            <th>Direccion</th>
            <td>{{ $user->address }}</td>
            <th>Edad</th>
            <td>{{$user->age}}</td>
        </tr>
    </table>
    @can('edit', $user)
    <a href="/users/{{ $user->id}}/edit   "class="btn btn-info">Editar</a>
   @endcan

   <a class="btn btn-danger" href="{{ url()->previous() }}">
    {{-- <i class="fas fa-times-circle"> --}}
    </i>
    Regresar
</a>

</div>
</div>

    {{--  @can('destroy', $user)
    <form style="display:inline"
    method="POST"
    action="{{ route('users.destroy', $user->id)  }}">
       @csrf
       @method('DELETE')

   <button class="btn btn-danger" type="submit">Eliminar</button>
   </form>
    @endcan  --}}
@endsection
