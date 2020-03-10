@extends('layouts.master')
@section('title','Requisicion Autorizada')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-body">

                        <h5><strong>{{$requisitions->folio}}</strong>
                                @if($requisitions->status == "1")
                                <a href="{{route('quotes.edit', $requisitions->id) }}" style="margin-left: 10px" class="btn btn-primary btn float-right">
                                Subir cotizaciones <i class="fas fa-arrow-circle-right"> </i>
                                 </a>
                                 @endif
                             <a href="{{ url()->previous() }}" class="btn btn-danger btn float-right">
                                <i class="fas fa-arrow-circle-left"> Regresar</i>
                            </a>
                            <a style="margin-right: 10px" href="{{ asset('images/requisitions/'.$requisitions->img_req) }}" class="btn btn-success btn float-right"   title="{{ $requisitions->folio }}" download="{{ $requisitions->folio }}">
                                <i class="fas fa-download"> Descargar</i>
                              </a>
                         </h5>
                    </div>
                    <img src="{{ asset('images/requisitions/'.$requisitions->img_req  )}}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
@endsection
