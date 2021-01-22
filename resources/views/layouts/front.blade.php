<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') | Cursos DOSSIER </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    {{-- Font Awesome 4.7 --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  </head>
  
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">          
          <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}" width="95" alt="DOSSIER Cursos y Talleres"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <section class="col-xs-12 col-md-11">
                <ul class="navbar-nav mr-auto justify-content-end">
                  <li class="nav-item active">
                    <a class="nav-link" style="color: #FFFFFF !important;" href="#docente"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Docente</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color: #FFFFFF !important;" href="#temas"><i class="fa fa-list" aria-hidden="true"></i> Metodología</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color: #FFFFFF !important;" href="#inversion"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar</a>
                  </li>
                </ul>						
            </section>
            <section class="col-xs-12 col-md-1 text-center">
                <a href="https://api.whatsapp.com/send?phone=51947166517&amp;text=Deseo%20más%20información" target="_blank" class="btn btn-green" style="border-radius: 50% !important;">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
            </section>
          </div>
        </div>
      </nav>
      <main>
        @yield('content')
      </main>

    <footer>
      <div class="container-fluid mt-5 bg-dark text-white">
        <div class="row p-5">
          <section class="col-12 text-center">
            DOSSIER - {{date('Y')}} - Todos los derechos reservados.
          </section>

        </div>        
      </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>