<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom CSS -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>@yield('titulo') | Panel de Administración</title>
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="padding:0 !important;">
    <a href="/panel"> <img src="{{asset('images/logo.png')}}" width="120" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

        </ul>
        <span class="navbar-text">
        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu navbar-dark bg-dark" style="right:0 !important;" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Cambiar contraseña</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </span>
    </div>
    </nav>

    <main style="margin-top: 80px; margin-bottom: 45px;">

    <div class="container-fluid">
      <div class="row">
          <section class="col-2 col-md-2">
          <div class="list-group">
              <a class="list-group-item list-group-item-action active">
                <span><i class="fa fa-cog" aria-hidden="true"></i></span> <span class="hidden">Opciones</span>
              </a>
              <a href="{{url('panel/courses')}}" class="list-group-item list-group-item-action text-primary">
                <span><i class="fa fa-book" aria-hidden="true"></i></span> <span class="hidden">Cursos</span>
              </a>
              <a href="{{url('panel/instructor')}}" class="list-group-item list-group-item-action text-primary">
                <span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> <span class="hidden">Docentes</span>
              </a>
          </div>
          </section>
          <section class="col-10 col-md-10">
            @yield('content')
          </section>
      </div>
  </div>

    </main>

    <footer class="fixed-bottom">
      <nav class="navbar navbar-dark bg-dark text-white justify-content-center" style="padding:0 !important;">
          <h6> <small> PULL CREATIVO COMUNICACIONS - {{date('Y')}} </small> </h6>
      </nav>
    </footer>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
  </body>
</html>