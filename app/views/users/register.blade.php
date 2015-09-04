@extends('layouts.index')


@section('content')
        {{ Form::open(array('class'=>'form-signin', 'url' => '/users/register', 'method' => 'POST')) }}

		<center>
                <a href="/"><img src="{{ asset('imagenes/uniovi.png') }}" width="100" height="75"></img></a>
        </center> 
        <h2 class="form-signin-heading" style="color: #D8CEF6" align="center">Registro</h2>

	    <label for="inputName">Nombre</label>
	    <input type="text" name="name" id="inputName" class="form-control" placeholder="Introduzca su nombre" required=""  autofocus="" maxlength="40" />
	        
	    <label for="inputSurname1">Primer apellido</label>
	    <input type="text" name="surname1" id="inputSurname1" class="form-control" placeholder="Introduzca su primer apellido" required="" maxlength="50" />
	        
	    <label for="inputSurname2">Segundo apellido</label>
	    <input type="text" name="surname2" id="inputSurname2" class="form-control" placeholder="Introduzca su segundo apellido" required="" maxlength="50"/>
	    
	    <label for="inputEmail">Email</label>
	    <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Introduzca su correo electrónico" required="" maxlength="200" />
	        
	    <label for="inputPassword">Contraseña</label>
	    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Introduzca su contraseña" required="" />

	    <label for="inputPassword2">Confirmar contraseña</label>
	    <input type="password" name="repassword" id="inputPassword2" class="form-control" placeholder="Confirme su contraseña" required="" />
	    
        <button class="btn btn-lg btn-info btn-block" type="submit">Registrar</button>
        
        @if(Session::get('error'))
        <div class="alert alert-danger" style='margin-top: 5px'>
        {{ Session::get('error') }}
        </div>
        @endif
        {{ Form::close() }}
@stop