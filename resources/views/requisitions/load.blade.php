@extends('layouts.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <strong>
                Adventencia:
            </strong>
            Debe completar los siguientes campos
        </div>
    @endif
    <div class="container">
        <style>
            h1 {
                color: cornflowerblue;
            }

        </style>
        <h1> <strong> Subir requisición firmada </strong><h4>(FOTO)</h4></h1>

        <br>
     <h2> <strong>{{$requisitions->folio}}</strong></h2>
    </div>
    <br>
    <form action="{{route('requisitions.upload',$requisitions->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="input-group col-md-10">
        <div class="input-group-prepend">
            <span class="input-group-text" ><strong>Subir archivo de requisicion </strong></span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="img_req" accept="image/*">
            <label class="custom-file-label" for="inputGroupFile01">Seleccionar un archivo</label>
        </div>
    <br>
        </div>
        <br>
        <div class="form-group col-md-4">
        @if ($errors->has('img_req'))
            <p style="color:red">  {{$errors->first('img_req')}} </p>
        @endif
    </div>
        <br>
        <br>

        <a class="btn btn-danger" href="{{ url()->previous() }}">
            <i class="fas fa-times-circle">
            </i>
            Cancelar
        </a>
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-check-circle">
            </i>
            Subir
        </button>
    </form>

    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var img_req = e.target.files[0].name;
            $('.custom-file-label').html(img_req);
        });
    </script>

    @endsection
