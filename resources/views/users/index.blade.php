@extends('layouts.master')
@section('title', 'Usuarios')
@section('content')
@include('common.alerts')
<h1>
    Usuarios
    <small class="text-muted">
        Listado
    </small>
    <a class="btn btn-success btn-sm" href="{{ route('users.create')}}">
        <i class="fas fa-plus-square">
        </i>
        Añadir
    </a>
</h1>
<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="example">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Roles
                    </th>
                    <th>
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>

                        {{--  {{ dd($user->roles->count() ) }}  --}}
                        @foreach ($user->roles as $role)
                           <li> {{$role->display_name}}</li>
                        @endforeach
                        {{-- {{ $user->roles->pluck('display_name')->implode(', ') }} --}}
                    </td>
                    <td>
                        <a class="btn btn-info btn-xs"
                        {{--  href="{{ route('users.edit'), $user->id }}">Editar</a>  --}}
                        href="/users/{{$user->id }}">Ver</a>
                        <form style="display:inline"
                         method="POST"
                         {{--  action="{{ route('users.destroy', $user->id) }}">  --}}
                         action="{{ route('users.destroy', $user->id)  }}">
                            @csrf
                            @method('DELETE')

                        <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
