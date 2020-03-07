@extends('layouts.master')
@section('title','Cotizaciones')
@section('content')
@include('common.alerts')
    <h1>Cotizaciones
        <small class="text-muted">Lista</small>
            {{--  @if(auth()->user()->isAdmin())
                <a class="btn btn-success btn-sm" href="{{ route('quotes.create') }}">
                    <i class="fas fa-plus-square">
                    </i>
                    Añadir
                </a>
            @endif  --}}
    </h1>
    <div class="card">
        <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Fecha de cotizacion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cotizaciones</th>
                        <th scope="col">Orden de compra</th>
                     </tr>
                    </thead>
                    <tbody>
                        @forelse ($quotes as $q)
                    <tr>
                        <td><a href="{{route('requisitions.authorized')}}/{{$q->requisition_id}}">
                            <strong> {{ $q->requisitions->folio }} </strong></a></td>
                        <td>
                           {{ $q->quotes->created_at }}
                        </td>
                        <td>
                            <button class="btn btn-info btn-xs" type="submit">Cotizada</button>
                        </td>
                        <td>
                            @if(!is_null($q->quotes->prov_one_img))
                            <a href="{{ Storage::url($q->quotes->prov_one_img) }}" class="btn-descargar" target="_blank">
                                <i class="fas fa-download"></i>
                              </a>

                            @endif
                            @if(!is_null($q->quotes->prov_two_img))
                            <a href="{{ Storage::url($q->quotes->prov_two_img) }}" class="btn-descargar" target="_blank">
                                <i class="fas fa-download"></i>
                              </a>

                            @endif
                            @if(!is_null($q->quotes->prov_three_img))
                            <a href="{{ Storage::url($q->quotes->prov_three_img) }}" class="btn-descargar" target="_blank">
                                <i class="fas fa-download"></i>
                              </a>

                            @endif
                        </td>
                        <td>
                            <a class="btn btn-success btn-xs"
                            href="{{ route('purchased.edit',$q->requisitions->id)  }}">Generar</a>

                            @if(auth()->user()->isAdmin())
                            <form style="display:inline"
                             method="POST"
                             action="{{ route('quotes.destroy', $q->requisitions->id)  }}">
                                @csrf
                                @method('DELETE')

                            <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                            </form>

                            @endif
                        </td>
                    </tr>
                    @empty
                    <div class="container">
                    <div class="alert alert-dark text-center" role="alert">
                        <h5>
                             <strong>Ninguna requisición cotizada</strong>
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
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
