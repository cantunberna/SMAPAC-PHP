@extends('layouts.master')
@section('title','Subir Cotizaciones')
@section('content')
    <div class="container">
        <h1>Cotizaciones
            <small class="text-muted">Subir</small>
            @if(auth()->user()->isTitular())
                <a class="btn btn-danger btn-sm" href="{{ url()->previous() }}">
                    <i class="fas fa-backspace">
                    </i>
                    Cancelar
                </a>
            @endif
        </h1>
        
        <div>
            <form action="{{route('quotes.store')}}"method="POST" enctype="multipart/form-data">
                 @method('POST')
                @csrf
               <h2 style="color:#1fc8e3;"> <strong>Requisicion: {{$requisition->folio}}</strong></h2>
               <input type="text" class="custom-file-input" name="requisition_id" value="{{$requisition->id}}" hidden>
            </div>
        
    <div class="row contenedor">
        <div class="form-group col-md-4">
            <label for="inputState">Proveedor #1</label>
            <select id="prov1"  name="prov_id_one"class="form-control sel">
                <option disabled selected>Selecciona un proveedor</option>
                @foreach($providers as $prov)
                <option data-name="{{$prov->address}}" data-rfc="{{$prov->rfc}}" value="{{$prov->id}}">{{$prov->name}}</option>

                @endforeach
            </select>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">RFC</label>
                <div>
                    <input type="text" class="form-control" id="prov_rfc" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">Direccion</label>
                <div>
                    <input type="text"  class="form-control" id="prov_address" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">Cotización</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input file-input1" id="file1" name="prov_one_img" accept="image/*">
                    <label class="custom-file-label form-control-file">Seleccionar un archivo</label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Proveedor #2</label>
            <select id="prov2" name="prov_id_two" class="form-control sel">
                <option disabled selected>Selecciona un proveedor</option>
                @foreach($providers as $prov)
                    <option data-name2="{{$prov->address}}"  data-rfc2="{{$prov->rfc}}" class="active" value="{{$prov->id}}">{{$prov->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">RFC</label>
                <div>
                    <input type="text" class="form-control" id="prov2_rfc" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">Direccion</label>
                <div>
                    <input type="text"  class="form-control" id="prov2_address" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">Cotización</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input file-input2" id="file2" name="prov_two_img" accept="image/*">
                    <label class="custom-file-label form-control-file">Seleccionar un archivo</label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Proveedor #3</label>
            <select id="prov3" name="prov_id_three" class="form-control sel">
                <option  disabled selected>Selecciona un proveedor</option>
                @foreach($providers as $prov)
                    <option data-name3="{{$prov->address}}"  data-rfc3="{{$prov->rfc}}" class="active" value="{{$prov->id}}">{{$prov->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">RFC</label>
                <div>
                    <input type="text"  class="form-control" id="prov3_rfc" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">Direccion</label>
                <div>
                    <input type="text"  class="form-control" id="prov3_address" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-form-label">Cotización</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input file-input3" id="file3" name="prov_three_img"  accept="image/*">
                    <label class="custom-file-label form-control-file">Seleccionar un archivo</label>
                </div>
            </div>
          </div>
        </div>
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-check-circle"></i>Subir     
            </button>
          </form>
          <br><br>
        </div>
        
<script src="/js/app.js"></script>
<script type="text/javascript">
    $('.file-input1').on('change',function(){
    var fileName = document.getElementById("file1").files[0].name;
    $(this).next('.form-control-file').addClass("selected").html(fileName);
    }) 
    
    $('.file-input2').on('change',function(){
    var fileName = document.getElementById("file2").files[0].name;
    $(this).next('.form-control-file').addClass("selected").html(fileName);
    })

    $('.file-input3').on('change',function(){
    var fileName = document.getElementById("file3").files[0].name;
    $(this).next('.form-control-file').addClass("selected").html(fileName);
    })
</script>

<script>
    const $contenedor = $('.contenedor');
    const $selects = $contenedor.find('select');
    const $options = $contenedor.find('select option');

    const data = $options.toArray().reduce((obj, option) => (option.value && (obj[option.value] = obj[option.value] || option.selected), obj), {});

    function updateData() {
        Object.keys(data).forEach(value => data[value] = false);
        $selects.each((index, el) => (el.value !== "" && (data[el.value] = true)));
    };

    $contenedor.on('change', 'select', () => {
        updateData();
        $options.each((index, el) => (el.value !== "" && !el.selected && (el.disabled = data[el.value]), true));
    });
</script>

<script type="text/javascript">
    $('#prov1').on('change', function () {
        var name = $(this).children('option:selected').data('name');
        var rfc = $(this).children('option:selected').data('rfc');
        $('#prov_address').val(name);
        $('#prov_rfc').val(rfc);
    });
    $('#prov2').on('change', function () {
        var name = $(this).children('option:selected').data('name2');
        var rfc = $(this).children('option:selected').data('rfc2');
        $('#prov2_address').val(name);
        $('#prov2_rfc').val(rfc);
    });
    $('#prov3').on('change', function () {
        var name = $(this).children('option:selected').data('name3');
        var rfc = $(this).children('option:selected').data('rfc3');
        $('#prov3_address').val(name);
        $('#prov3_rfc').val(rfc);
    });
</script>
   
@endsection
