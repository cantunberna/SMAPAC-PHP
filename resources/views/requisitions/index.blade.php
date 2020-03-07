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
                        {{--  <th>
                            Fecha
                        </th>  --}}

                        {{--  <th>
                            Unidad Administrativa
                        </th>  --}}
                        <th>
                            Fecha solicitada
                        </th>
                        {{--  <th>
                            Asunto
                        </th>  --}}
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
                    @forelse ($requisitions as $requi)

                        {{--  @if($requi->requisition_id)  --}}
                            <tr>


                          <td> <strong>{{$requi->requisition->folio}}</strong></td>
                        {{--  <td>
                            {{$requisicion->added_on}}
                        </td>  --}}
                  {{--
                  *****DESBLOQUEAR LAS COORDDINACIONES Y DEPARTAMENTOS
                        <td>
                            @foreach ($requi->coordinations as $coor)
                                <li> {{$coor->name}}</li>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($requi->departments as $depar)
                                <li> {{$depar->name}}</li>
                            @endforeach
                        </td>

                        --}}
                        {{--  <td>
                            {{$requisicion->administrative_unit }}
                        </td>  --}}
                        <td>
                            {{$requi->requisition->added_on }}
                        </td>
                        {{--  <td>
                            {{$requisicion->issue }}
                        </td>  --}}
                        <td>
                            {{$requi->requisition->required_on}}
                          {{--
                       <img style="  width: 60px; height: 60px;" src="{{ asset('images/requisitions/'.$requi->img_req  )  }}">
   --}}
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-xs" type="submit">Pendientes</button>
                        </td>
                        <td>
                            <a class="btn btn-info btn-xs"
                            {{--  href="{{ route('users.edit'), $user->id }}">Editar</a>  --}}
                            href="/requisitions/{{$requi->requisition->id }}">Ver</a>
                            @if(auth()->user()->isAdmin())
                            <form style="display:inline"
                             method="POST"
                             {{--  action="{{ route('users.destroy', $requi->id) }}">  --}}
                             action="{{ route('requisitions.destroy', $requi->requisition->id)  }}">
                                @csrf
                                @method('DELETE')

                            <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                            </form>

                            @endif
                            {{-- <div class="form-group">
                                <a class="btn btn-warning btn-sm" href="/requisitions/{{$requi->requisition->id}}/edit">
                                    <i class="fas fa-pen">
                                    </i>
                                </a>
                            </div>&nbsp;&nbsp; --}}
                        </td>
                 </tr>
                 @empty
                 <div class="container">
                 <div class="alert alert-dark text-center" role="alert">
                     <h5>
                          <strong>Crear una requisicion</strong>  <a class="btn btn-success btn-sm" href="{{ route('requisitions.create') }}">
                            <i class="fas fa-plus-square">
                            </i>
                            Añadir
                        </a>
                     </h5>
                     <hr>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                 </div>
                 </div>
                 </div>
                 @endforelse
             </tbody>
         </table>
     </div>
 </div>
@endsection
