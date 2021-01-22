@extends('layouts.app')
@section('titulo') Asignar beneficios a curso {{$curso->title}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Asignación de Beneficios</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Beneficio al curso</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="curso" name="curso" aria-describedby="curso" value="{{$curso->title}}" readonly>
        </div>
    </section>
</div>


<form action="{{ url('/panel/courses/addbenefit') }}" method="post">
    <div class="row">
    {{ csrf_field() }}
    <input type="hidden" value="{{$curso->id}}" name="course_id">
        <div class="col-12 col-md-10">
            <div class="form-group">
                <input type="text" class="form-control" id="benefit" name="benefit" placeholder="Ingrese la descripción" required>
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
            <th scope="col">Beneficios</th>            
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
        @foreach($curso->benefits as $index => $benefit)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>                
                <td class="font-weight-light">{{$benefit->benefit}} </td>
                <td width="12%" class="font-weight-light">
                    <form method="post" action="{{ url('panel/courses/'.$curso->id.'/addbenefit/'.$benefit->id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar este beneficio?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>              
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </section>
</div>
@endsection