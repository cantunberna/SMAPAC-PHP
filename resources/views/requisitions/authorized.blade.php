@extends('layouts.master')
@section('title', 'Requisiciones Autorizadas')
@section('content')
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
            @foreach ($requisitions as $requi)

                <tr>
                    <td>
                        {{$requi->folio}}
                    </td>
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
                        {{$requi->added_on }}
                    </td>
                    {{--  <td>
                        {{$requisicion->issue }}
                    </td>  --}}
                    <td>
                        {{$requi->required_on}}
                        {{--
                     <img style="  width: 60px; height: 60px;" src="{{ asset('images/requisitions/'.$requi->img_req  )  }}">
 --}}
                    </td>
                    <td>
                        <button class="btn btn-warning btn-xs" type="submit">En proceso de compra</button>
                    </td>
                    <td>
                        <a class="btn btn-info btn-xs"
                           {{--  href="{{ route('users.edit'), $user->id }}">Editar</a>  --}}
                           href="/requisitions/authorized/{{$requi->id }}">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
