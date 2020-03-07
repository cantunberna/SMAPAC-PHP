@extends('layouts.master')
@section('title','Generar orden de compra')
@section('content')




<div class="container col-md-10 ">
    <form action="{{ action('PurchasedController@store') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
    <h1><input type="text" name="requisition_id" value="{{$requisitions->id}}" hidden>
        <strong> {{ $requisitions->folio }}
        </strong>
        </h1>
        <table class="table">
        <tr>
            <th >Fecha de registro:</th>
            <td >{{ $requisitions->added_on}}</td>
            <th>Fecha solicitada para requerir:</th>
            <td>{{ $requisitions->required_on }}</td>
        </tr>
        <tr>
            <th>Coordinacion:</th>
            <td>@foreach ($requisitions->coordinations as $coordination)
                <input type="text" name="coordination_id" value="{{$coordination->id}}" hidden>
                    {{ $coordination->name }}
                @endforeach</td>
            <th>Departamento:</th>
            <td>@foreach ($requisitions->departments as $department)
                <input type="text" name="department_id" value="{{$department->id}}" hidden>
                    {{ $department->name }}
                @endforeach</td>
        </tr>
        <tr>
            <th>Direccion:</th>
            <td>{{ $requisitions->management }}</td>
            <th>Unidad Administrativa:</th>
            <td>{{ $requisitions->administrative_unit }}</td>
        </tr>
        <tr>
            <th>Asunto:</th>
            <td>{{ $requisitions->issue }}</td>
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
            @foreach ($requesteds as $req)
            <tbody>
            <tr>
                <th>
                    {{--  <input name="departure[]" value=" {{$req->requesteds->departure }}" hidden>  --}}
                        {{$req->requesteds->departure }}
                </th>
                <td>
                    {{--  <input name="quantity[]" value=" {{$req->requesteds->quantity }}" hidden>  --}}
                        {{$req->requesteds->quantity }}
                </td>
                <td>
                    {{--  <input name="unit[]" value=" {{$req->requesteds->unit }}" hidden>  --}}
                        {{$req->requesteds->unit }}
                </td>
                <td>
                    {{--  <input name="concept[]" value=" {{$req->requesteds->concept }}" hidden>  --}}
                        {{$req->requesteds->concept }}
                </td>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input   name="id_requesteds[]" type="checkbox" class="form-check-input" value="{{ $req->requesteds->id }}">Solicitar
                        </label>
                      </div>
                </td>
            </tr>
            </tbody>
            @endforeach

            <thead class="table-bordered">
                <th colspan="4">
                    Observaciones:
                    {{ $requisitions->remark }}
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

        {{--  <div class="container">
            <div class="row">
                <div class="col-sm">
                  <strong>  SOLICITO </strong>
                </div>
                <div class="col-sm">
                    <strong>Vo.Bo</strong>
                </div>
                <div class="col-sm">
                    <strong>AUTORIZÓ</strong>
                </div>
            </div>
            <br>
            <br>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    _________________________
                </div>
                <div class="col-sm">
                    _________________________
                </div>
                <div class="col-sm">
                    _________________________
                </div>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    {{$nametitular->profession}}. {{$nametitular->name}} {{$nametitular->paterno}} {{$nametitular->materno}}<br>
                    @foreach($roltitular as $rol)
                        {{$rol->display_name }} de
                    @endforeach
                    {{$department->name}}
                </div>
                <div class="col-sm">
                    @if($coordination->user_id)
                    {{$coordination->user->profession}} {{$coordination->user->name}} {{$coordination->user->paterno}} {{$coordination->user->materno}}<br>
                     @endif
                        Titular de la {{$coordination->name}}
                </div>
                <div class="col-sm">
                    Ing. Nicolas Hernandez Ynurreta Mancera <br>
                    Director General

                </div>
            </div>
        </div>
        </div>
        </div>  --}}

    <br>
    <br>
    <a class="btn btn-danger" href="{{ url()->previous() }}">
        <i class="fas fa-times-circle">
        </i>
        Cancelar
    </a>
    <button class="btn btn-primary btn float-right" type="submit">
        <i class="fas fa-check-circle">
        </i>
        Generar
    </button>
</div>
<br>
</form>

@endsection
