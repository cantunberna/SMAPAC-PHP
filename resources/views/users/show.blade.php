@extends('layouts.master')
@section('title', 'Vista')
@section('content')

    <h1>{{ $user->name }}</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Cargo:</th>
            <td>@foreach ($user->roles as $role)
                <li>{{ $role->display_name }}</li>
            @endforeach</td>
        </tr>
    </table>
     {{-- @can('edit', $user)
     <a href="/users/{{ $user->id}}/edit   "class="btn btn-info">Editar</a>
    @endcan  --}}

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
