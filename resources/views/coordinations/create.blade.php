@extends('layouts.master')
@section('title','Crear coordinación')
@section('content')
<h1>
    Nueva Coordinación
</h1>
@if ($errors->any())
<div class="alert alert-danger text-center">
    <strong>
        Adventencia:
    </strong>
    Debe completar los siguientes campos
</div>
@endif
<form action="{{route('coordinations.store')}}" class="form-group" method="POST">
    @include('coordinations.form', ['coordinacion' => new App\Coordination])
    <a class="btn btn-danger" href="/coordinations">
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
