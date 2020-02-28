@extends('layouts.master')
@section('title','Asignar Cotizaciones')
@section('content')
    @include('common.alerts')
    <div class="container">
    <h1>Cotizaciones
        <small class="text-muted">Subir</small>
        @if(auth()->user()->isTitular())
            <a class="btn btn-danger btn-sm" href="{{ url()->previous() }}">
                <i class="fas fa-backspace">
                </i>
                Cancelar
            </a>
        @endif
    </h1>
<br>
    <div>
    <form>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-3 col-form-label">Folio de requisición</label>
            <div class="col-md-6">
                <input readonly type="text" name="folio" class="form-control" id="inputEmail3" placeholder="" value="{{ old('folio')}}">
            </div>
        </div>

    </form>
    </div>

    </div>
@endsection
