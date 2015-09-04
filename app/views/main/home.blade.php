@extends('layouts.base')
 
@section('content')
    <h2 class="sub-header" style="margin-top:0px" align="center"><strong>Tutoriales Web</strong></h2>
        <p><small>Aplicación web destinada a facilitar el estudio de ciertos temas de computabilidad, 
            como son los Programas While y las Máquinas de Turing</small></p>
        <p><small>...</small></p>
        <center>
                <img src="{{ asset('imagenes/turingMachine.png') }}" width="300" height="200"></img>
        </center>

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
@stop