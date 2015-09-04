@extends('layouts.base')
 
@section('content')
      
      <div class="form-signin">
        <a href="{{ url('/admin/users') }}"><button class="btn btn-warning btn-sm">Atras</button></a>
      </div>
      {{ Form::open(array('role'=>'form', 'url' => ('/admin/edit/'.$user->id), 'method' => 'POST')) }}
      
      <h2 class="sub-header" style="margin-top:0px" align="center"><strong>Editar usuario</strong></h2>

      <div class="row">
      <div class="col-xs-6">
      <label for="inputName">Nombre</label>
      <input type="text" name="name" id="inputName" class="form-control" required=""  autofocus="" maxlength="40" value="{{ $user->name }}"/>
      </div>
      <div class="col-xs-6">
      <label for="inputSurname1">Primer apellido</label>
      <input type="text" name="surname1" id="inputSurname1" class="form-control" required="" maxlength="50" value="{{ $user->surname1 }}"/>
      </div>
      </div>

      <div class="row">
      <div class="col-xs-6">
      <label for="inputSurname2">Segundo apellido</label>
      <input type="text" name="surname2" id="inputSurname2" class="form-control" required="" maxlength="50" value="{{ $user->surname2 }}"/>
      </div>
      <div class="col-xs-6">
      <label for="inputEmail">Email</label>
      <input type="text" name="email" id="inputEmail" class="form-control" required="" maxlength="200" value="{{ $user->email }}" />
      </div>
      </div>

      <div class="row">
      <div class="col-xs-2">
      <label for="inputRole">Rol</label>
      <select name="role" class="form-control" required="">
      @if ($user->role=='0')
        <option selected id="inputRole" value="0">Usuario</option>
        <option id="inputRole" value="1">Administrador</option>
      @else 
        <option id="inputRole" value="0">Usuario</option>
        <option selected id="inputRole" value="1">Administrador</option>
      @endif
      </select>
      </div>
      <div class="col-xs-2">
      <label for="inputActivated">¿Activado?</label>
      <select name="activated" class="form-control" required="">
      @if ($user->activated=='0')
        <option selected id="inputActivated" value="0">No</option>
        <option id="inputActivated" value="1">Si</option>
      @else 
        <option id="inputActivated" value="0">No</option>
        <option selected id="inputActivated" value="1">Si</option>
      @endif
      </select> 
      </div>
      </div>

      <button class="btn btn-lg btn-info" style='margin-top: 20px' type="submit">Editar usuario</button> 
      

      @if(Session::get('error'))
      <div class="alert alert-danger" style='margin-top: 5px'>
      {{ Session::get('error') }}
      </div>
      @endif
    
      {{ Form::close() }}
@stop