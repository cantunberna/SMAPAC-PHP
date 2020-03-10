@extends('layouts.master')
@section('title', 'Crear Requisicion')
@section('content')
<h2>
    Nueva Requisición
</h2>
    @if ($errors->any())
    <div class="alert alert-danger text-center">
        <strong>
            Adventencia:
        </strong>
        Debe completar los siguientes campos
    </div>
    @endif

<form action="/requisitions" class="form-group" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-1 offset-md-8 col-form-label">Folio</label>
            <div class="col-md-3">
                @foreach($coor as $c)
                    @foreach($depar as $d)
                <input  readonly type="text" name="folio" class="form-control text-right" id="inputEmail3"
                       value="{{$c->slug}}/{{$d->slug}}/{{$countreq }}/{{date('Y')}}">
                    @endforeach
                @endforeach
            </div>
        </div>
        <input type="hidden" name="accountant" value="{{$countreq}}">
        <input type="hidden" name="user_id" value="{{$users}}">
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-1 offset-md-8 col-form-label">Fecha</label>
            <div class="col-md-3">
              <input type="date" name="added_on" class="form-control" id="inputEmail3" placeholder="" value="{{old ('added_on')}}">
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-1 col-form-label">Direccion</label>
            <div class="col-md-8">
              <input type="text" name="management" class="form-control" id="inputEmail3" placeholder="SMAPAC"  readonly value="SMAPAC">
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-2 col-form-label">Coordinación</label>
            <div class="col-md-4">
                @foreach ($coor as $coordinations)
                <input type="text"  class="form-control" readonly placeholder="" value="{{ $coordinations->name or old('coordination_id')}}">
                    <input type="hidden" name="coordination_id" class="form-control" readonly placeholder="" value="{{ $coordinations->id or old('coordination_id')}} ">
                @endforeach
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-2 col-form-label">Departamento</label>
            <div class="col-md-4">
                @foreach ($depar as $departamentos)
                    <input type="text"  class="form-control" readonly placeholder="" value="{{ $departamentos->name or old('coordination_id')}}">
                    <input type="hidden" name="department_id" class="form-control" readonly placeholder="" value="{{ $departamentos->id or old('coordination_id')}} ">
                @endforeach
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-3 col-form-label">Unidad Administrativa</label>
            <div class="col-md-6">
              <input type="text" name="administrative_unit" class="form-control" id="inputEmail3" placeholder="" value="{{ old('administrative_unit')}}">
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-3 col-form-label">Fecha Para Requerir Material</label>
            <div class="col-md-3">
              <input type="date" name="required_on" class="form-control" id="inputEmail3" placeholder="" value="{{ old('required_on')}}">
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-1 col-form-label">Asunto</label>
            <div class="col-md-5">
              <input type="text" name="issue" class="form-control" id="inputEmail3" placeholder="" value="{{ old('issue')}}">
            </div>

        </div>

    </div>
    <div class="field_wrapper">
    <div class="form-group col-md-2">
        <label for="">Opción</label><br>
        <button type="button" class="add_button btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Añadir</button>
            <input class="form-control" type="text" name="cont" id="cont" hidden>
    </div>
    </div>
      {{--  <div class="form-group row col-md-12">
            <label for="inputEmail3" class="col-md-3 col-form-label">Archivo de Requisición</label>
            <div class="col-md-6">
              <input type="file" name="img_req" class="form-control" id="inputEmail3" placeholder="" value="{{ old('img_req')}}">
            </div>
        </div> --}}
        <div class="form-group row col-md-12">


            <label for="inputEmail3" class="col-md-2 col-form-label">Observaciónes</label>
            <div class="col-md-10">
              <input type="text" name="remark" class="form-control" id="inputEmail3" placeholder="" value="{{ old('remark')}}">
            </div>
        </div>


    <a class="btn btn-danger" href="/requisitions">
        <i class="fas fa-times-circle">
        </i>
        Cancelar
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fas fa-check-circle">
        </i>
        Guardar
    </button>
</form>
<script src="/js/app.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 20; //Limitación de incremento de campos de entrada
        var addButton = $('.add_button'); //Agregar selector de botones
        var wrapper = $('.field_wrapper'); //Contenedor de campo de entrada
        var fieldHTML = '<div class="form-row">' +
            '<div class="form-group col-md-2">' +
            '<label for="">Partida</label>' +
            '<input type="text" name="departure[]" class="form-control" id="partida" placeholder="">' +
            '</div>' +
            '<div class="form-group col-md-2">' +
            '<label for="">Cantidad</label>' +
            '<input type="text" name="quantity[]" class="form-control" id="cantidad" placeholder="">' +
            '</div>' +
            '<div class="form-group col-md-2">' +
            '<label for="">Unidad</label>' +
            '<input type="text" name="unit[]" class="form-control" id="unidad" placeholder="">' +
            '</div>' +
            '<div class="form-group col-md-6">' +
            '<label for="">Concepto</label>' +
            '<input type="text" name="concept[]" class="form-control" id="concepto">' +
            '</div>' +

            '<button type="button" class="remove_button btn btn-danger btn-sm">' +
            '<i class="fas fa-minus-circle">' +
            '</i>' +
            '</button>' +
            '</div>' +

            '</div>'; //Nuevo campo de entrada html
        var x = 0; //El contador de campo inicial es 1
        //Una vez que se hace clic en el botón Agregar

        $(addButton).click(function(){
            //Verifique el número máximo de campos de entrada
            if(x < maxField){
                x++; //Contador de campo de incremento
                $(wrapper).append(fieldHTML); //Agregar campo html
        document.getElementById("cont").value = x;

            }
        });

        //Una vez que se hace clic en el botón Eliminar
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remover campo html
            x--; //Decremento contador de campo
        });
    });

</script>
@endsection

