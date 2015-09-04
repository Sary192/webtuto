@extends('layouts.base')
 
@section('content')

      {{ Form::open(array('role'=>'form', 'url' => ('/main/password/'.$user->id), 'method' => 'POST')) }}
      
      <h2 class="sub-header" style="margin-top:0px" align="center"><strong>Cambiar contraseña<strong></h2>

      <div class="row">
      <div class="col-xs-6">
      <label for="inputPassword">Contraseña actual</label>
      <input type="password" name="oldpassword" id="inputOldPassword" class="form-control" placeholder="Introduzca su contraseña actual" required="" />
      </div></div>

      <div class="row">
      <div class="col-xs-6">
      <label for="inputPassword">Nueva contraseña</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Introduzca la nueva contraseña" required="" />
      </div></div>

      <div class="row">
      <div class="col-xs-6">
      <label for="inputPassword2">Confirmar nueva contraseña</label>
      <input type="password" name="repassword" id="inputPassword2" class="form-control" placeholder="Confirme la nueva contraseña" required="" />
      </div></div>

      <button class="btn btn-lg btn-info" style="margin-top: 20px" type="submit">Guardar</button>
      
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
    
      {{ Form::close() }}
@stop