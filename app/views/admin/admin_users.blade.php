@extends('layouts.base')
 
@section('content')
    <h2 class="sub-header" style="margin-top:0px" align="center"><strong>Gestión de usuarios</strong></h2>
    <div class="table-responsive">
    	<table class="table table-striped">
    		<thead>
    			<tr>
                  <th>Nombre</th>
                  <th>1<sup>er</sup> Apellido</th>
                  <th>2º  Apellido</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th>Activado</th>
                  <th></th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname1 }}</td>
                <td>{{ $user->surname2 }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->role=='0')
                    <td>Usuario</td>
                @else 
                    <td>Administrador</td>
                @endif

                @if ($user->activated=='0') 
                    <td>No</td>
                @else 
                    <td>Si</td>
                @endif
                <td>
                    <a href="{{ url('/admin/edit/'.$user->id) }}"> <img src="{{ asset('imagenes/edit.png') }}" width='20' height='20'></a>
                </td>
                <td>
                    <a href="{{ url('/admin/delete/'.$user->id) }}"> <img src="{{ asset('imagenes/delete.png') }}" width='20' height='20'></a>
                </td>
            </tr>
            @endforeach
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname1 }}</td>
                <td>{{ $user->surname2 }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->role=='0')
                    <td>Usuario</td>
                @else 
                    <td>Administrador</td>
                @endif

                @if ($user->activated=='0') 
                    <td>No</td>
                @else 
                    <td>Si</td>
                @endif
                <td>
                    <a href="{{ url('/admin/edit/'.$user->id) }}"> <img src="{{ asset('imagenes/edit.png') }}" width='20' height='20'></a>
                </td>
                <td>
                    <a href="{{ url('/admin/delete/'.$user->id) }}"> <img src="{{ asset('imagenes/delete.png') }}" width='20' height='20'></a>
                </td>
            </tr>
            @endforeach
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname1 }}</td>
                <td>{{ $user->surname2 }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->role=='0')
                    <td>Usuario</td>
                @else 
                    <td>Administrador</td>
                @endif

                @if ($user->activated=='0') 
                    <td>No</td>
                @else 
                    <td>Si</td>
                @endif
                <td>
                    <a href="{{ url('/admin/edit/'.$user->id) }}"> <img src="{{ asset('imagenes/edit.png') }}" width='20' height='20'></a>
                </td>
                <td>
                    <a href="{{ url('/admin/delete/'.$user->id) }}"> <img src="{{ asset('imagenes/delete.png') }}" width='20' height='20'></a>
                </td>
            </tr>
            @endforeach
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname1 }}</td>
                <td>{{ $user->surname2 }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->role=='0')
                    <td>Usuario</td>
                @else 
                    <td>Administrador</td>
                @endif

                @if ($user->activated=='0') 
                    <td>No</td>
                @else 
                    <td>Si</td>
                @endif
                <td>
                    <a href="{{ url('/admin/edit/'.$user->id) }}"> <img src="{{ asset('imagenes/edit.png') }}" width='20' height='20'></a>
                </td>
                <td>
                    <a href="{{ url('/admin/delete/'.$user->id) }}"> <img src="{{ asset('imagenes/delete.png') }}" width='20' height='20'></a>
                </td>
            </tr>
            @endforeach
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname1 }}</td>
                <td>{{ $user->surname2 }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->role=='0')
                    <td>Usuario</td>
                @else 
                    <td>Administrador</td>
                @endif

                @if ($user->activated=='0') 
                    <td>No</td>
                @else 
                    <td>Si</td>
                @endif
                <td>
                    <a href="{{ url('/admin/edit/'.$user->id) }}"> <img src="{{ asset('imagenes/edit.png') }}" width='20' height='20'></a>
                </td>
                <td>
                    <a href="{{ url('/admin/delete/'.$user->id) }}"> <img src="{{ asset('imagenes/delete.png') }}" width='20' height='20'></a>
                </td>
            </tr>
            @endforeach
			</tbody>
        </table>

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
      
    </div>
@stop