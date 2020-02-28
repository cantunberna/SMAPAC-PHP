@extends('layouts.master')
@section('title','Lista de actividades')
@section('content')
@include('common.alerts')
@include('activities.modal')

<h1>Actividades MIR 
  <small class="text-muted">Listado</small>
  <a href="/activities/create" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Añadir</a>
  <a href="{{ route('activities.excel') }}" class="btn btn-primary btn-sm"><i class="fas fa-download"></i>&nbsp;Generar Excel</a>
  {{-- <a href="{{ route('activities.pdf') }}" class="btn btn-warning btn-sm"><i class="fas fa-download"></i>&nbsp;Generar PDF</a> --}}
</h1>

<div class="card">
    <div class="card-body">
      <table id="example2" class="table table-hover">
        <thead>
        <tr>
          <th>Componente</th>
          <th>Departamento</th>
          <th>Actividades</th>
          <th style="width: 12%;">Monto</th>
          <th style="display: none">Trianual</th>
          <th style="display: none">2019</th>
          <th style="display: none">2020</th>
          <th style="display: none">2021</th>
          <th style="display: none">Indicador</th>
          <th style="display: none">Formula</th>
          <th style="display: none">Frecuencia</th>
          <th style="display: none">Unidad de Medida</th>
          <th style="display: none">Indicador Programado</th>
          <th style="display: none">1er. Trimestre</th>
          <th style="display: none">2do. Trimestre</th>
          <th style="display: none">3er. Trimestre</th>
          <th style="display: none">4to. Trimestre</th>
          <th style="display: none">Indicador Real</th>
          <th style="display: none">1er. Trimestre</th>
          <th style="display: none">2do. Trimestre</th>
          <th style="display: none">3er. Trimestre</th>
          <th style="display: none">4to. Trimestre</th>
          <th style="display: none">Total Acumulado</th>
          <th style="display: none">Medios de Verificación</th>
          <th style="display: none">Supuesto</th>
          <th style="width: 15%;">Opciones</th>
        </tr>
        </thead>

        <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>C{{$activity->component->component}}</td>
            <td>{{$activity->department->name}}</td>
            <td>{{$activity->activity}}</td>
            <td>{{$activity->amount}}</td>
            <td style="display: none">{{$activity->trianual}}</td>
            <td style="display: none">{{$activity->fist_year}}</td>
            <td style="display: none">{{$activity->second_year}}</td>
            <td style="display: none">{{$activity->third_year}}</td>
            <td style="display: none">{{$activity->indicator}}</td>
            <td style="display: none">{{$activity->formula}}</td>
            <td style="display: none">{{$activity->frequency}}</td>
            <td style="display: none">{{$activity->measure}}</td>
            <td style="display: none">{{$activity->prog_indicator}}%</td>
            <td style="display: none">{{$activity->prog_one}}%</td>
            <td style="display: none">{{$activity->prog_two}}%</td>
            <td style="display: none">{{$activity->prog_three}}%</td>
            <td style="display: none">{{$activity->prog_four}}%</td>
            <td style="display: none">{{$activity->real_indicator}}%</td>
            <td style="display: none">{{$activity->real_one}}%</td>
            <td style="display: none">{{$activity->real_two}}%</td>
            <td style="display: none">{{$activity->real_three}}%</td>
            <td style="display: none">{{$activity->real_four}}%</td>
            <td style="display: none">{{$activity->total}}%</td>
            <td style="display: none">{{$activity->verification}}</td>
            <td style="display: none">{{$activity->supposed}}</td>
            <td>

            <div class="form-row">
            {{-- <form class="form-group" method="POST" action="/activities/{{$activity->slug}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>&nbsp;&nbsp; --}}

            <div class="form-group">
            <a class="btn btn-warning btn-sm" href="/activities/{{$activity->id}}/edit"><i class="fas fa-pen"></i></a>
            </div>&nbsp;&nbsp;

            <div class="form-group">
            <a class="btn btn-primary btn-sm" href="" data-target="#edit" data-toggle="modal" data-component="C{{$activity->component->component}}" data-department="{{$activity->department->name}}" data-activity="{{$activity->activity}}" data-amount="${{$activity->amount}}" data-trianual="{{$activity->trianual}}" data-2019="{{$activity->fist_year}}" data-2020="{{$activity->second_year}}" data-2021="{{$activity->third_year}}" data-indicator="{{$activity->indicator}}" data-formula="{{$activity->formula}}" data-frequency="{{$activity->frequency}}" data-measure="{{$activity->measure}}" data-progindicator="{{$activity->prog_indicator}}%" data-progone="{{$activity->prog_one}}%" data-progtwo="{{$activity->prog_two}}%" data-progthree="{{$activity->prog_three}}%" data-progfour="{{$activity->prog_four}}%" data-realindicator="{{$activity->real_indicator}}%" data-realone="{{$activity->real_one}}%" data-realtwo="{{$activity->real_two}}%" data-realthree="{{$activity->real_three}}%" data-realfour="{{$activity->real_four}}%" data-total="{{$activity->total}}%" data-verification="{{$activity->verification}}" data-supposed="{{$activity->supposed}}"><i class="fas fa-eye"></i></a>
            </div>

            </div>
            </td>
        </tr>
        @endforeach
        </tbody>

      </table>
    </div>
  </div>

@endsection




