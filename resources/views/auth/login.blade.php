
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="PULL CREATIVO COMUNICACIONES">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Cursos Dossier · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        html,body {
            height: 100%;
            }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
      .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="text-center">
    
    <main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="{{asset('images/black.png')}}" alt="" width="182" height="57">
        <h1 class="h5 mb-3 fw-normal">Iniciar sesión</h1>
        <label for="inputEmail" class="visually-hidden">Correo electrónico</label>        
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email" autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>        
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
        <div class="checkbox mb-3">
        {{-- <label> <input type="checkbox" value="remember-me"> Remember me </label> --}}
        <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-{{date('Y')}}</p>
    </form>
    </main>
    
  </body>
</html>

