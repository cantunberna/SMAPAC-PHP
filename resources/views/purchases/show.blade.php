@extends('layouts.master')
@section('title', 'Orden de compra')
@section('content')

<div class="container col-md-10 ">
    <style>
    h1 {
        color: cornflowerblue;
    }
    h2{
        color: darkgoldenrod;
    }
    </style>
        <a class="btn btn-danger" href="{{ url()->previous() }}">
        <i class="fas fa-backspace">
        </i>
        Regresar
        </a>

        @foreach ($products as $p)

        @if($p->status == '0')
        <a class="btn btn-info" href="{{route('purchased.load',$p->purchases->id) }} ">
            <i class="fas fa-file-upload">
            </i>
            Subir
        </a>
        @endif
        <a class="btn btn-warning" href='javascript:;' onclick="genPDF();"><i class="fas fa-print"></i>&nbsp;PDF</a>
        {{--  @endif  --}}

    <br>
    <br>
    <h1>ORDEN DE COMPRA</s> </h1><h2>{{ $p->purchases->requisition->folio}}</h2>
    <br>
        <table class="table">
        <tr>
            <th >Fecha de registro:</th>
            <td >{{ $p->purchases->requisition->added_on}}</td>
            <th>Fecha solicitada para requerir:</th>
            <td>{{ $p->purchases->requisition->required_on}}</td>
        </tr>
        <tr>
            <th>Coordinacion:</th>
            <td>@foreach ($p->purchases->requisition->coordinations as $coordination)
                    {{ $coordination->name }}
                @endforeach</td>
            <th>Departamento:</th>
            <td>@foreach ($p->purchases->requisition->departments as $department)
                    {{ $department->name }}
                @endforeach</td>
        </tr>
        <tr>
            <th>Direccion:</th>
            <td>{{ $p->purchases->requisition->management}}</td>
            <th>Unidad Administrativa:</th>
            <td>{{ $p->purchases->requisition->administrative_unit }}</td>
        </tr>
        <tr>
            <th>Asunto:</th>
            <td>{{ $p->purchases->requisition->issue}}</td>
        </tr>

        <table class="table table-bordered">
            <thead class="table-bordered">
            <tr>
                <th scope="col">PARTIDA</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">UNIDAD</th>
                <th scope="col">CONCEPTO</th>
            </tr>
            </thead>
            <tbody>
             <tr>
                <@foreach ($requesteds as $req)

                <th>
                    <li>
                        {{$req->departure}}
                    </li>
                </th>
                <td>
                    <li>
                        {{$req->quantity }}
                    </li>
                </td>
                <td>
                    <li>
                        {{$req->unit }}
                    </li>
                </td>
                <td>
                    <li>
                        {{ $req->concept }}
                    </li>
                </td>
            </tr>
            @endforeach

            </tbody>
            <thead class="table-bordered">
                <th colspan="4">
                    Observaciones:
                    {{ $p->purchases->requisition->remark}}
                </th>
            </thead>
        </table>
        <div class="container" id="content" style="display:none">
            <table>
                <thead>
                  <tr>
                    <th>PARTIDA</th>
                    <th>CANTIDAD</th>
                    <th>UNIDAD</th>
                    <th>CONCEPTO</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>HOLA</td>
                    <td>holar</td>
                    <td>holar</td>
                    <td>holar</td>
                    {{--  <td>{{$requisitions->quantity }}</td>
                    <td>{{$requisitions->unit}}</td>
                    <td>{{$requisitions->concept}}</td>  --}}
                  </tr>
                </tbody>
              </table>
              <thead>
                  <th>
                      observacionesyiujl
                  </th>
              </thead>
        </div>
        <div id="elementH"></div>
    </table>
                {{--<img src="{{ asset('images/requisitions/'.$requisitions->img_req  )  }}" class="img-fluid img-thumbnail" alt="...">
           --}}
    <br>
        {{--  <div class="container">  --}}
            {{--  <div class="row">
                <div class="col-sm">
                  <strong>  SOLICITO </strong>
                </div>
                <div class="col-sm">
                    <strong>Vo.Bo</strong>
                </div>
                <div class="col-sm">
                    <strong>AUTORIZÓ</strong>
                </div>
            </div>  --}}
            <br>
        {{--  <div class="container">  --}}
            {{--  <div class="row">
                <div class="col-sm">
                    _________________________
                </div>
                <div class="col-sm">
                    _________________________
                </div>
                <div class="col-sm">
                    _________________________
                </div>
            </div>  --}}
        {{--  <div class="container">  --}}
            <div class="row">
                <div class="col-sm">
                    {{--  {{$nametitular->profession}}. {{$nametitular->name}} {{$nametitular->paterno}} {{$nametitular->materno}}<br>  --}}
                    {{--  @foreach($roltitular as $rol)  --}}
                        {{--  {{$rol->display_name }} de  --}}
                    {{--  @endforeach  --}}
                    {{--  {{$department->name}}  --}}
                </div>
                <div class="col-sm">
                    {{--  @if($coordination->user_id)  --}}
                    {{--  {{$coordination->user->profession}} {{$coordination->user->name}} {{$coordination->user->paterno}} {{$coordination->user->materno}}<br>  --}}
                     {{--  @endif  --}}
                        {{--  Titular de la {{$coordination->name}}  --}}
                </div>
                <div class="col-sm">
                    {{--  Ing. Nicolas Hernandez Ynurreta Mancera <br>
                    Director General  --}}

                </div>
            </div>
        {{--  </div>
        </div>
        </div>  --}}
    </div>
    <br>
    @endforeach
    </form>
    </div>


@endsection
