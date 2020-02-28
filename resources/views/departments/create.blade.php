@extends('layouts.master')
@section('title','Crear Departamento')
@section('content')
<h1>
    Nuevo Departamento
</h1>
@if ($errors->any())
<div class="alert alert-danger text-center">
    <strong>
        Adventencia:
    </strong>
    Debe completar los siguientes campos
</div>
@endif
<form action="/departments" class="form-group" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">
                Nombre
            </label>
            <input class="form-control" id="name" name="name" type="text" value="{{ old('name')}}">
                @if ($errors->has('name'))
                <p style="color:red">
                    {{$errors->first('name')}}
                </p>
                @endif
            </input>
        </div>
        <div class="form-group col-md-4">
            <label for="">
                Slug
            </label>
            <input class="form-control" id="slug" name="slug" type="text" value="{{ old('slug')}}">
            @if ($errors->has('slug'))
                <p style="color:red">
                    {{$errors->first('slug')}}
                </p>
                @endif
                </input>
        </div>
       {{-- <div class="form-group col-md-4">
            <label for="">
                Titular del departamento
            </label>
            <input class="form-control" id="user_id" name="user_id" type="text" value="{{ old('user_id')}}">
            @if ($errors->has('user_id'))
                <p style="color:red">
                    {{$errors->first('user_id')}}
                </p>
                @endif
                </input>
        </div>--}}
        <div class="form-group col-md-4">
            <label for="">Jefe del departamento</label>
            <select class="form-control" id="inputState" name="user_id">
                <option disabled="" selected="">Selecciona...</option>
                @foreach ($users as $user)
                    @foreach ($user->user as $role)
                        <option value="{{ $role->id }}">
                            {{$role->profession}}. {{ $role->name }} {{$role->paterno}} {{$role->materno}}
                        </option>
                    @endforeach
                @endforeach
            </select>@if ($errors->has('user_id'))
                <p style="color:red">
                    {{$errors->first('user_id')}}
                </p>
            @endif
        </div>
    </div>
    <a class="btn btn-danger" href="/departments">
        <i class="fas fa-times-circle">
        </i>
        Cancelar
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fas fa-check-circle">
        </i>
        Guardar
    </button>
</form>
@endsection
