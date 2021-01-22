@extends('layouts.app')
@section('titulo') Docentes @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Docentes</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/instructor/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Docentes registrados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th width="10%" scope="col">Foto </th>
                <th scope="col">Nombres completos </th>
                <th scope="col"> Cargo </th>
                <th scope="col">Compañía </th>
                <th width="10%" scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($instructors as $instructor)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td> <img src="{{asset('uploads/'.$instructor->url_profile)}}" width="75" alt=""> </td>
                <td class="font-weight-light">{{$instructor->name}}</td>
                <td class="font-weight-light">{{$instructor->jobtitle}}</td>
                <td class="font-weight-light">{{$instructor->company}}</td>
                <td class="font-weight-light">
                    <a href="{{url('panel/instructor/'.$instructor->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <form method="post" action="{{ url('panel/instructor/'.$instructor->id.'/destroy' ) }}" style="display:inline;">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar este docente?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>               
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
    <section class="col-12">
    {!!$instructors->render()!!}
    </section>
</div>
@endsection