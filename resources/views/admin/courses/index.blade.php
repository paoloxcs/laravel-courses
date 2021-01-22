@extends('layouts.app')
@section('titulo') Cursos @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Cursos</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Cursos agregados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered table-sm" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col" width="8%">Portada </th>
            <th scope="col">Curso</th>
            <th scope="col">Docente</th>            
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Horario</th>
            <th scope="col">Duración</th>
            <th scope="col">Estado</th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td> <img src="{{asset('uploads/'.$curso->url_thumbnail)}}" width="85" alt=""> </td>
            <td class="font-weight-light"> {{ $curso->type}} {{$curso->title}} </td>
            <td class="font-weight-light"> {{ $curso->instructor->name }} </td>
            <td class="font-weight-light"> {{ $curso->fecha }} </td>
            <td class="font-weight-light"> {{ $curso->schedule }} </td>
            <td class="font-weight-light"> {{ $curso->duration }} </td>
            {{-- <td class="font-weight-light"><span class="badge badge-primary">S/. {{count($curso->prices) > 0 ? $curso->prices[0]->amount : 0}} </span></td> --}}
            {{-- <td class="font-weight-light"> {{ $curso->date_start }}</td> --}}
            <td class="font-weight-bold">
                @if($curso->is_active==1)
                    <strong><span class="text-success">Activo </span> </strong>
                @else
                    <strong><span class="text-dark"> Desactivado </span> </strong>
                @endif                
            </td>
            <td width="18%" class="font-weight-light">
                <a href="{{url('panel/courses/'.$curso->id.'/edit')}}" class="btn btn-info btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                <a href="{{url('panel/courses/'.$curso->id.'/addprice')}}" class="btn btn-warning btn-sm"> <i class="fa fa-credit-card-alt" aria-hidden="true"></i> </a>
                <a href="{{url('panel/courses/'.$curso->id.'/addmodule')}}" class="btn btn-secondary btn-sm"> <i class="fa fa-list-ul" aria-hidden="true"></i> </a>
                <a href="{{url('panel/courses/'.$curso->id.'/addbenefit')}}" class="btn btn-dark btn-sm"> <i class="fa fa-check-square" aria-hidden="true"></i> </a>
                
                <form method="post" action="{{ url('panel/courses/'.$curso->id.'/destroy' ) }}" style="display:inline;">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar este curso?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
    <section class="col-12">
    {!!$cursos->render()!!}
    </section>
</div>
@endsection