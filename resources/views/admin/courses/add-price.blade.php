@extends('layouts.app')
@section('titulo') Asignar precio a curso {{$curso->title}} @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Asignación de Precios</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Precio al curso</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{$curso->title}}" readonly>
        </div>
    </section>
</div>


<form action="{{ url('/panel/courses/addprice') }}" method="post">
    <div class="row">
    {{ csrf_field() }}
        <input type="hidden" value="{{$curso->id}}" name="course_id">
        <div class="col-12 col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="amount" name="amount" placeholder="0.00" required>
                <small id="amount" class="form-text text-muted">Monto</small>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="dscto" name="dscto" value="0.00">
                <small id="dscto" class="form-text text-muted">Descuento</small>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" id="info" name="info" placeholder="Descripcion del Monto" required>
                <small id="info" class="form-text text-muted">Max. 40 caracteres</small>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="form-group">
                <select name="promo" id="promo" class="form-control">
                    <option value="1">En promoción</option>
                    <option value="0" selected>Sin promoción</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
        </div>
    </div>
</form>


<div class="row">
    <section class="col-12">
        <table class="table table-bordered table-sm" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col"> Descripción </th>            
            <th scope="col"> Precio </th>
            <th scope="col"> Descuento </th>            
            <th scope="col"> En promoción </th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($curso->prices as $price)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td class="font-weight-light">{{ $price->info }}</td>
                <td class="font-weight-light">S/. {{$price->amount}} </td>
                <td class="font-weight-light">S/. {{$price->dscto}} </td>                
                <td class="font-weight-light">
                    @if($price->promo==1)
                    <p class="text-success">En Promoción</p>                        
                    @else
                    <p class="text-dark">Sin promoción</p>
                    @endif
                </td>
                <td width="12%" class="font-weight-light">                                        
                    <form method="post" action="{{ url('panel/courses/'.$curso->id.'/addprice/'.$price->id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar este precio?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
        </table>
    </section>
</div>
@endsection