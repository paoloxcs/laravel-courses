@extends('layouts.app')
@section('titulo') Registrar docente @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar Docente</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/instructor')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/instructor') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">    
    <section class="col-12 col-md-3">
    <div class="form-group">
            <input type="file" class="form-control-file {{ $errors->has('url_profile') ? ' is-invalid' : '' }}" name="url_profile" id="url_profile" required>
            @if ($errors->has('url_profile'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('url_profile') }}
            </div>
            @endif
            <small id="url_profile" class="form-text text-muted">Max. 150Kb | Dimen. 700 x 700 px</small>
        </div>        
    </section>

    <section class="col-12 col-md-9">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" placeholder="Nombre completo del docente" value="{{old('name')}}" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 150 caracteres.</small>
        </div>

        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('jobtitle') ? ' is-invalid' : '' }}" id="jobtitle" name="jobtitle" aria-describedby="jobtitle" placeholder="Cargo" value="{{old('jobtitle')}}" required>
            @if ($errors->has('jobtitle'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('jobtitle') }}
            </div>
            @endif
            <small id="jobtitle" class="form-text text-muted">Max. 85 caracteres.</small>
        </div>

        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('company') ? ' is-invalid' : '' }}" id="company" name="company" aria-describedby="company" placeholder="Empresa" value="{{old('company')}}" required>
            @if ($errors->has('company'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('company') }}
            </div>
            @endif
            <small id="company" class="form-text text-muted">Max. 85 caracteres.</small>
        </div>



    </section>

    <section class="col-12">
        <div class="form-group">
            <textarea name="bio" id="bio" rows="5" class="form-control ckeditor {{ $errors->has('bio') ? ' is-invalid' : '' }}" placeholder="Ingrese toda la información del docente" required>{{old('bio')}}</textarea>
                @if ($errors->has('bio'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('bio') }}
                </div>
                @endif
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection