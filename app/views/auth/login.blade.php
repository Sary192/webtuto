  @extends('layouts.index')

  @section('content')
    
      <div class="container">
        {{ Form::open(array('class'=>'form-signin', 'url' => '/login', 'method' => 'POST')) }}
        <img src="imagenes/uniovi.png" width="300" height="200" style='margin-top: 50px'></img>
        <h2 class="form-signin-heading" style="color: #D8CEF6">Por favor, inicie sesión</h2>
        <label for="inputEmail" class="sr-only">Email:</label>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" required="" autofocus="" />
        <label for="inputPassword" class="sr-only">Password:</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" />
        <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
        {{ Form::close() }} 
        <div class="form-signin">
          <a href="{{ url('/users/register') }}"><button class="btn btn-info btn-block">Registro</button></a>
        </div>

        <div class="form-signin">
        @if(Session::get('error'))
        <div class="alert alert-danger" style='margin-top: 5px'>
          {{ Session::get('error') }}
        </div>
        @endif

        @if(Session::get('warning'))
        <div class="alert alert-warning" style='margin-top: 5px'>
          {{ Session::get('warning') }}
        </div>
        @endif

        @if(Session::get('success'))
        <div class="alert alert-success" style='margin-top: 5px'>
          {{ Session::get('success') }}
        </div>
        @endif
        </div>

      </div> <!-- /container -->   
  @stop