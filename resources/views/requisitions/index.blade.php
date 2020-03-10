@extends('layouts.master')
@section('title', 'Requisiciones')
@section('content')
@include('common.alerts')

<h1>Requisiciones
    <small class="text-muted">Pendientes</small>
    @if(auth()->user()->isTitular())

    <a class="btn btn-success btn-sm" href="{{ route('requisitions.create') }}">
        <i class="fas fa-plus-square">
        </i>
        Añadir
    </a>
        @endif
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
                          <td> <strong>{{$requi->requisition->folio}}</strong></td>
                        <td>
                            {{$requi->requisition->added_on }}
                        </td>

                        <td>
                            {{$requi->requisition->required_on}}
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-xs" type="submit">Pendientes</button>
                        </td>
                        <td>
                            <a class="btn btn-info btn-xs"
                            href="/requisitions/{{$requi->requisition->id }}">Ver</a>
                            @if(auth()->user()->isAdmin())
                            <form style="display:inline"
                             method="POST"
                             action="{{ route('requisitions.destroy', $requi->requisition->id)  }}">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
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
