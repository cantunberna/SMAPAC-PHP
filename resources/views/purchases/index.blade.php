@extends('layouts.master')
@section('title','Ordenes de Compras')
@section('content')
@include('common.alerts')
<div class="container">
    <h1><strong>Ordenes de compra
        {{--  <small class="text-muted">    </small>  --}}
        {{--  @if(auth()->user()->isAdmin())
            <a class="btn btn-success btn-sm" href="{{ route('requisitions.create') }}">
                <i class="fas fa-plus-square">
                </i>
                Añadir
            </a>
        @endif  --}}
    </strong>
    </h1>
    <br>
       <div class="card">
            <div class="card-body">
                <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                            <th>
                                REQ.NO
                            </th>
                            <th>
                                Fecha de compra
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchases as $p)

                                <tr>
                             <td>  <strong> {{$p->purchases->requisition->folio}}</strong></td>
                            <td>
                                {{$p->purchases->created_at }}
                            </td>
                            <td>
                                @if($p->purchases->status == '0')
                                <button class="btn btn-info btn-xs" type="submit">Subir Factura</button>
                                @else
                                <button class="btn btn-success btn-xs" type="submit">Comprado</button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info btn-xs"
                                    href="{{ route('purchased.destroy',$p->purchases->id ) }}">
                                    Ver
                                </a>
                                @if(auth()->user()->isAdmin())
                                    <form style="display:inline"
                                    method="POST"
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-xs" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                            </td>
                     </tr>
                    </tbody>
                        @empty
                            <div class="container">
                                <div class="alert alert-dark text-center" role="alert">
                                    <h5>
                                        <strong>No existen ninguna orden de compra</strong>
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        @endforelse
                </table>

     </div>
     </div>
     </div>
@endsection
