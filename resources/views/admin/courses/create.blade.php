@extends('layouts.app')
@section('titulo') Registrar curso @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar curso</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/courses') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
        <section class="col-12 col-md-4">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" id="type" name="type" aria-describedby="type" placeholder="Tipo de curso" value="{{old('type')}}" required>
                @if ($errors->has('type'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('type') }}
                </div>
                @endif
                <small id="type" class="form-text text-muted">Max. 120 caracteres.</small>
            </div>
        </section>
        <section class="col-12 col-md-8">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" aria-describedby="title" placeholder="Título de curso" value="{{old('title')}}" required>
                @if ($errors->has('title'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
                @endif
                <small id="title" class="form-text text-muted">Max. 180 caracteres.</small>
            </div>
        </section>
    </div>

    <div class="row">
        <section class="col-12 col-md-3">
            <div class="form-group">
                <input type="date" step="1" class="form-control {{ $errors->has('date_start') ? ' is-invalid' : '' }}" name="date_start" id="date_start" value="{{date('Y-m-d')}}">
                @if ($errors->has('date_start'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('date_start') }}
                </div>
                @endif
            </div>
        </section>

        <section class="col-12 col-md-3">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('fecha') ? ' is-invalid' : '' }}" id="fecha" name="fecha" aria-describedby="fecha" placeholder="Fecha del curso" value="{{old('fecha')}}" required>
                @if ($errors->has('fecha'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('fecha') }}
                </div>
                @endif
                <small id="fecha" class="form-text text-muted">Max. 40 caracteres.</small>
            </div>
        </section>

        <section class="col-12 col-md-3">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('schedule') ? ' is-invalid' : '' }}" id="schedule" name="schedule" aria-describedby="schedule" placeholder="Horario" value="{{old('schedule')}}" required>
                @if ($errors->has('schedule'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('schedule') }}
                </div>
                @endif
                <small id="schedule" class="form-text text-muted">Max. 50 caracteres.</small>
            </div>
        </section>

        <section class="col-12 col-md-3">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" id="duration" name="duration" aria-describedby="duration" placeholder="Duración" value="{{old('duration')}}" required>
                @if ($errors->has('duration'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('duration') }}
                </div>
                @endif
                <small id="duration" class="form-text text-muted">Max. 30 caracteres.</small>
            </div>
        </section>
    </div>

    <div class="row">
        <section class="col-12 col-md-4">
            <div class="form-group">
                <select name="instructor" id="instructor" class="form-control">
                    @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}"> {{$instructor->name}} </option>
                    @endforeach
                </select>
            </div>
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <input type="number" class="form-control {{ $errors->has('session') ? ' is-invalid' : '' }}" id="session" name="session" aria-describedby="session" placeholder="Sesiones" value="{{old('session')}}" required>
                @if ($errors->has('session'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('session') }}
                </div>
                @endif                
            </div>
        </section>

        <section class="col-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('url_platform') ? ' is-invalid' : '' }}" id="url_platform" name="url_platform" aria-describedby="url_platform" placeholder="Ej. https://plataforma.constructivo.com/curso/curso-de-arquitectura-8754645" value="{{old('url_platform')}}">
                @if ($errors->has('url_platform'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('url_platform') }}
                </div>
                @endif               
            </div>
        </section>
    </div>

    <div class="row">
        <section class="col-12 col-md-6">
            <div class="form-group">
                <label for="objectives">Objetivos</label>
                <textarea name="objectives" id="objectives" rows="3" class="form-control {{ $errors->has('objectives') ? ' is-invalid' : '' }} ckeditor" placeholder="Aqui los objetivos">
                    {{ old('objectives') }}
                </textarea>
                @if ($errors->has('objectives'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('objectives') }}
                </div>
                @endif
            </div>
        </section>
        <section class="col-12 col-md-6">
            <div class="form-group">
                <label for="public">Público</label>
                <textarea name="public" id="public" rows="3" class="form-control {{ $errors->has('public') ? ' is-invalid' : '' }} ckeditor" placeholder="">
                    {{ old('public') }}
                </textarea>
                @if ($errors->has('public'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('public') }}
                </div>
                @endif
            </div>
        </section>
    </div>

    <div class="row">
        <section class="col-12 col-md-2">
            <div class="form-group">
                <label for="portrait">Portada</label>
                <input type="file" class="form-control-file {{ $errors->has('portrait') ? ' is-invalid' : '' }}" name="portrait" id="portrait" required>
                @if ($errors->has('portrait'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('portrait') }}
                </div>
                @endif
                <small id="portrait" class="form-text text-muted">Max. 150Kb | Dimen. 1423 x 730 px</small>
            </div>
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <label for="url_banner">Descripción</label>
                <input type="file" class="form-control-file {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" required>
                @if ($errors->has('description'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                @endif
                <small id="description" class="form-text text-muted">Max. 150Kb | Dimen. 500 x 400 px</small>
            </div>
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <label for="inversion">Inversion</label>
                <input type="file" class="form-control-file {{ $errors->has('inversion') ? ' is-invalid' : '' }}" name="inversion" id="inversion" required>
                @if ($errors->has('inversion'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('inversion') }}
                </div>
                @endif
                <small id="inversion" class="form-text text-muted">Max. 150Kb | Dimen. 1423 x 730 px</small>
            </div>
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <label for="url_thumbnail">Thumbnail</label>
                <input type="file" class="form-control-file {{ $errors->has('url_thumbnail') ? ' is-invalid' : '' }}" name="url_thumbnail" id="url_thumbnail" required>
                @if ($errors->has('url_thumbnail'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('url_thumbnail') }}
                </div>
                @endif
                <small id="url_thumbnail" class="form-text text-muted">Max. 150Kb | Dimen. 500 x 700 px</small>
            </div>
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <label for="url_banner">Banner</label>
                <input type="file" class="form-control-file {{ $errors->has('url_banner') ? ' is-invalid' : '' }}" name="url_banner" id="url_banner" required>
                @if ($errors->has('url_banner'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('url_banner') }}
                </div>
                @endif
                <small id="url_banner" class="form-text text-muted">Max. 150Kb | Dimen. 500 x 500 px</small>
            </div>
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <label for="is_active">Estado</label>
                <select name="is_active" id="is_active" class="form-control">                    
                    <option selected value="1">Activo</option>
                    <option value="0">Inactivo</option>                 
                </select>
            </div>
        </section>
    </div>

    <div class="row">
        <section class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </section>
    </div>
    </form>
    

@endsection