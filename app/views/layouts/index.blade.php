<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{ HTML::style('bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('bootstrap/css/bootstrap.theme.min.css') }}
    {{ HTML::style('bootstrap/css/signin.css') }}

    {{ HTML::script('bootstrap/js/jquery.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}

    <link rel="icon" type="image/png" href="{{ asset('imagenes/favicono.png') }}" />
    <title>@yield('title') | Proyecto Fin de Carrera</title>
</head>
<body>
    @yield('content')
</body>
</html>