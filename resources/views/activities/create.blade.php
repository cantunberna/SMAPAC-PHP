@extends('layouts.master')
@section('title','Añadir actividad')
@section('content')
<h1>MIR <small class="text-muted">Añadir Actividad</small></h1>

  <form action="/activities" method="POST" class="form-group">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="">Componente</label>
        <select class="form-control" id="component_id" name="component_id">
          <option disabled="" selected="">Elige un componente</option>
          @foreach ($components as $component)
        <option value="{{ $component->id }}" data-fed="{{$component->fedresource}}" data-own="{{$component->ownresource}}"> 
              C{{ $component->component }}
          </option>
          @endforeach
      </select>
      </div>

       <div class="form-group col-md-3">
        <label for="">Tipo de Recursos</label>
        <select class="form-control" id="type" name="resource">
          <option disabled="" selected="">Federales o Propios</option>
          <option id="fede"></option>
          <option id="pro"></option>
      </select>
      </div>

      <div class="form-group col-md-3">
        <label for="">Recursos Restantes</label>
        <input type="text" class="form-control restant" id="rest" readonly>
        <span class="error"><p id="name_error" style="color: red"></p></span>
      </div>

      <div class="form-group col-md-3">
        <label for="">Departamento</label>
        <select class="form-control" id="inputState" name="department_id">
          <option disabled="" selected="">Elige un departamento</option>
          @foreach ($departments as $department)
          <option value="{{ $department->id }}">
              {{ $department->name }}
          </option>
          @endforeach
      </select>
      </div>
    </div>

    <div class="field_wrapper">
        <div class="form-row">
        <div class="form-group col-md-10">
            <label for="">Actividad</label>
            <textarea class="form-control" name="activity" id="activity" rows="4"></textarea>
        </div>
        <div class="form-group col-md-2">
            <label for="">Monto</label>
            <input type="text" name="amount" class="form-control monto" id="number" placeholder="$" >
        </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
          <label for="">Trianual</label>
          <input type="text" name="trianual" class="form-control" id="trianual" value="{{ old('amount')}}">

        </div>
        <div class="form-group col-md-2">
          <label for="">2019</label>
          <input type="text" name="fist_year" class="form-control" id="fist_year" value="{{ old('amount')}}">

        </div>
        <div class="form-group col-md-2">
            <label for="">2020</label>
            <input type="text" name="second_year" class="form-control" id="second_year" value="{{ old('amount')}}">
        </div>
        <div class="form-group col-md-2">
            <label for="">2021</label>
            <input type="text" name="third_year" class="form-control" id="third_year" value="{{ old('amount')}}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="">Indicador</label>
          <input type="text" name="indicator" class="form-control">

        </div>
        <div class="form-group col-md-5">
          <label for="">Formula</label>
          <input type="text" name="formula" class="form-control">

        </div>
        <div class="form-group col-md-2">
            <label for="">Frecuencia</label>
            <input type="text" name="frequency" class="form-control" value="Trimestral" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="">Unidad de Medida</label>
            <input type="text" name="measure" class="form-control" value="Porcentaje" readonly>
        </div>
      </div>

        <div class="card col-md-12">
          <div class="card-header text-center">
            <strong>Programado 2020</strong>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="">Indicador programado</label>
                <input type="text" name="prog_indicator" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="">1er. Trimestre</label>
                <input type="text" name="prog_one" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">2do. Trimestre</label>
              <input type="text" name="prog_two" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">3er. Trimestre</label>
              <input type="text" name="prog_three" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">4to. Trimestre</label>
              <input type="text" name="prog_four" class="form-control">
            </div>
          </div>
          </div>
        </div>

        <div class="card col-md-12">
          <div class="card-header text-center">
            <strong>Realizado 2020</strong>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="">Indicador real</label>
                <input type="text" name="real_indicator" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="">1er. Trimestre</label>
                <input type="text" name="real_one" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">2do. Trimestre</label>
              <input type="text" name="real_two" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">3er. Trimestre</label>
              <input type="text" name="real_three" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">4to. Trimestre</label>
              <input type="text" name="real_four" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="">Total acumulado</label>
              <input type="text" name="total" class="form-control">
            </div>
          </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Medios de verificación</label>
            <input type="text" name="verification" class="form-control">
          </div>
          <div class="form-group col-md-4">
              <label for="">Supuesto</label>
              <input type="text" name="supposed" class="form-control">
          </div>
        </div>

        <a href="/activities" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>&nbsp;

        <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i>&nbsp;Guardar</button>
    
  </form>
  <br>

<script src="/js/app.js"></script>
<script type="text/javascript">
  $('#type').change(function(){
    var id = $(this).children(":selected").attr("id");
    if(id == "fede"){
      $('form').append('<input type="hidden" id="demo" class="form-control" name="status" value="All">');
    }else{
        $('#demo').remove();
    }
});
</script>

<script type="text/javascript">
$('#component_id').on('change',function(){
    var fed = $(this).children('option:selected').data('fed');
    var own = $(this).children('option:selected').data('own');
    $('#fede').text(fed);
    $('#pro').text(own);
});
</script>

<script type="text/javascript">

$(document).ready(function() {
  sum();
  $("#type, #number").on("keydown keyup", function() {
    sum();
  });
});

function sum() {
  var num1 = document.getElementById('type').value.replace(/,/g,'');
  var num2 = document.getElementById('number').value.replace(/,/g,'');
  var result = parseInt(num1) - parseInt(num2);
  if (result < 0) {
    nameError = "Dinero insuficiente, corrige el monto de la actividad";
    document.getElementById("name_error").innerHTML = nameError; 
  }else {
    document.getElementById("name_error").innerHTML = '';
    document.getElementById('rest').value = result;
  }
}
</script>

@endsection
