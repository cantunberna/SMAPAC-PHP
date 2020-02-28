@extends('layouts.master')
@section('title','Cotizaciones')
@section('content')
    @include('common.alerts')
    <h1>Cotizaciones
        <small class="text-muted">Lista</small>
        @if(auth()->user()->isTitular())

            <a class="btn btn-success btn-sm" href="{{ route('quotes.create') }}">
                <i class="fas fa-plus-square">
                </i>
                Añadir
            </a>
    @endif
    </h1>
    <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Proveedor #1</th>
                        <th scope="col">Proveedor #2</th>
                        <th scope="col">Proveedor #3</th>
                     </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="{{ route('requisitions.index') }}">HOLA</a></td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>

    </div>
@endsection
