@extends('layouts.master')
@section('title','Cotizadas')
@section('content')
    <div class="container">
        Cotizaciones
        {{--  @foreach ($quotes as $q)  --}}


        <a href="{{ Storage::url($quotes->prov_one_img) }}" class="btn-descargar" target="_blank">
            <i class="fas fa-download"></i>
          </a>
        <a href="{{ Storage::url($quotes->prov_two_img) }}" class="btn-descargar" target="_blank">
            <i class="fas fa-download"></i>
          </a>
        <a href="{{ Storage::url($quotes->prov_three_img) }}" class="btn-descargar" target="_blank">
            <i class="fas fa-download"></i>
          </a>
          {{--  @endforeach  --}}
    </div>
@endsection
