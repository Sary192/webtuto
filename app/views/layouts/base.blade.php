<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{ HTML::style('bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('bootstrap/css/bootstrap.theme.min.css') }}
    {{ HTML::style('bootstrap/css/navbar-fixed-top.css') }}

    {{ HTML::script('bootstrap/js/jquery.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}

    <link rel="icon" type="image/png" href="{{ asset('imagenes/favicono.png') }}" />

    @yield('head')
    <title>@yield('title') | Proyecto Fin de Carrera</title>
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menú desplegable</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tutoriales Web</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ Request::path()=='main' ? 'active' : '' }}"><a href="{{ url('/main') }}">Inicio</a></li>
            <li class="{{ Request::path()=='main/teoria' ? 'active' : '' }}"><a href="{{ url('/main/teoria') }}" id="teoria">Teoría</a></li>
            <li class="{{ Request::path()=='main/while' ? 'active' : '' }}"><a href="{{ url('/main/while') }}" id="while">Programas While</a></li>
            <li class="{{ Request::path()=='main/turing' ? 'active' : '' }}"><a href="{{ url('/main/turing') }}" id="turing">Máquinas de Turing</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} {{ Auth::user()->surname1 }} {{ Auth::user()->surname2 }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if (Auth::user()->role=='1')
                <li><a href="{{ url('/admin/users') }}">Gestión de usuarios</a></li>
                @endif
                <li><a href="{{ url('/main/password/'.Auth::user()->id) }}">Cambiar contraseña</a></li>
              </ul>
            </li>
            <li><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="margin-top:10px">
      <div class="jumbotron">
        @yield('content')
      </div>
    </div> <!-- /container -->
</body>
</html>