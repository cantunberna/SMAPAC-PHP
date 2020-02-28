@extends('layouts.master')
@section('title','Editar Coordinación')
@section('content')
    <h1>
        Editar Coordinación
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <strong>
                Adventencia:
            </strong>
            Debe completar los siguientes campos
        </div>
    @endif
    <form action="/coordinations/{{$coordinacion->slug}}" class="form-group" method="POST">
        @method('PUT')
        @include('coordinations.form')
        <a class="btn btn-danger" href="/coordinations">
            <i class="fas fa-times-circle">
            </i>
            Cancelar
        </a>
        <button class="btn btn-success" type="submit">
            <i class="fas fa-check-circle">
            </i>
            Actualizar
        </button>
    </form>

@endsection
