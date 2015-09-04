@extends('layouts.base')

@section('content')
    <h2 class="sub-header" style="margin-top:0px" align="center"><strong>Máquinas de Turing</strong></h2>
      <center><APPLET
                        archive = "TuringOpenshift.jar"
                        code = "InterfazApplet.class"
                        codebase = "/turing"
                        width    = "650"
                        height   = "600">
      </APPLET></center>

		<p><small>Para la correcta utilización del applet, debes de seguir las siguientes instrucciones:
		Vaya a Configuracion de Java, y en la pestaña de Seguridad agregue la url del sitio (una por cada applet).
		Luego cierre el navegador y vuelva a entrar.</small></p>
        <center>
                <img src="{{ asset('imagenes/turingMachine2.png') }}" width="300" height="200"></img>
        </center>
@stop