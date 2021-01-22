@extends('layouts.app')
@section('titulo') Agregar Módulos para {{$curso->title}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administrar Módulos</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Módulo {{ $curso->name }}</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="curso" name="curso" aria-describedby="curso" value="{{ $curso->title }}" readonly>
        </div>
    </section>
</div>


<form action="{{ url('/panel/courses/addmodule') }}" method="post">
    <div class="row">
    {{ csrf_field() }}
        <input type="hidden" value="{{$curso->id}}" name="course_id">
        <section class="col-12">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="module" name="module" aria-describedby="module" placeholder="Nombre del Módulo" required>
                @if ($errors->has('name'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('module') }}
                </div>
                @endif
                <small id="name" class="form-text text-muted">Max. 180 caracteres.</small>
            </div>
        </section>
        <section class="col-12">
            <div class="form-group">
                <textarea name="info" id="info" rows="2" class="form-control ckeditor {{ $errors->has('info') ? ' is-invalid' : '' }}" placeholder="Ingrese resumen del texto" required></textarea>
                @if ($errors->has('info'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('info') }}
                </div>
                @endif                
            </div>  
        </section>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
        </div>
    </div>
</form>


<div class="row">
    <section class="col-12">
        <table class="table table-bordered table-sm" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Módulos</th>
                <th scope="col">Información</th>
                <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>            
            @foreach($curso->syllabus as $module)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td class="font-weight-light"> {{ $module->module }} </td>
                <td class="font-weight-light"><small>{!!$module->info!!}</small></td> 
                <td width="12%" class="font-weight-light">                    
                    <form method="post" action="{{ url('panel/courses/'.$module->course_id.'/addmodule/'.$module->id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar este Módulo?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
</div>
@endsection