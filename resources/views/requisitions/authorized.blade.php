@extends('layouts.master')
@section('title', 'Requisiciones Autorizadas')
@section('content')
@include('common.alerts')

<h1>Requisiciones
    <small class="text-muted"> autorizadas</small>
</h1>

<div class="card">
    <div class="card-body">
        <table class="table table-hover" id="example">
            <thead>
            <tr>
                <th>
                    REQ.NO
                </th>
                <th>
                    Fecha solicitada
                </th>
                <th>
                    Fecha para requerir
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
                @foreach ($requisitions as $requi)
                <tr>
                    <td>
                     <strong>{{$requi->requisition->folio}}</strong>
                    </td>
                    <td>
                        {{$requi->requisition->added_on }}
                    </td>
                    <td>
                        {{$requi->requisition->required_on}}
                    </td>
                    <td>
                        <button class="btn btn-warning btn-xs" type="submit">Por cotizar</button>
                    </td>
                    <td>
                        <a class="btn btn-info btn-xs"
                           href="{{ route('requisitions.show_authorized',$requi->requisition->id)  }}">
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
