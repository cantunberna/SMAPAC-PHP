@extends('layouts.master')
@section('title','Lista de departamentos')
@section('content')
@include('common.alerts')
<h1>
    Departamentos
    <small class="text-muted">
        Listado
    </small>
    <a class="btn btn-success btn-sm" href="/departments/create">
        <i class="fas fa-plus-square">
        </i>
        Añadir
    </a>
</h1>
<div class="card">
    <div class="card-body">
        <table id="example" class="table table-hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                    {{-- <th>
                        Coordinación
                    </th> --}}
                    <th>
                        Titular
                    </th>
                    <th>
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($departamentos as $dep)
                    {{-- @if($dep->department_id) --}}
                <tr>
                    <td>
                        {{$dep->id}}
                    </td>
                    <td>
                        {{$dep->name}}
                    </td>
                    <td>

                        {{$dep->user->profession}}. {{$dep->user->name}} {{$dep->user->paterno}} {{$dep->user->materno}}
                    </td>
                    {{-- <td> --}}
                        {{-- <td>
                            @foreach ($dep->coordinatio as $departments)
                                  <li> {{$departments->name}}</li>
                               @endforeach --}}
                   {{-- <li> {{ $coord->departments->pluck('name')->implode(',') }}</li> --}}
                           {{-- </td> --}}
                        {{--  <li>{{ $dep->coordination->pluck('name')->implode(', ') }}</li>  --}}
                    {{-- </td> --}}
                    <td>
                        <div class="form-row">
                        <form action="{{route ('departments.destroy', $dep->slug)}}" class="form-group" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash">
                                    </i>
                                </button>
                            </form>&nbsp;&nbsp;
                            <div class="form-group">
                                <a class="btn btn-warning btn-sm" href="/departments/edit">
                                    <i class="fas fa-pen">
                                    </i>
                                </a>
                            </div>&nbsp;&nbsp;
                            <div class="form-group">
                                <a class="btn btn-primary btn-sm" href="/departments/">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>


</div>

@endsection
