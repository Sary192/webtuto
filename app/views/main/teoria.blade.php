@extends('layouts.base')

@section('content')
    <h2 class="sub-header" style="margin-top:0px" align="center"><strong>Teoría</strong></h2>
    	<p><small>Una máquina de Turing es un dispositivo inventado por Alan Turing que manipula símbolos sobre una tira de cinta 
    		de acuerdo a una tabla de reglas. A pesar de su simplicidad, una máquina de Turing puede ser adaptada para simular
    		 la lógica de cualquier algoritmo de computador y es particularmente útil en la explicación de las funciones 
    		 de una CPU dentro de un computador.
			La máquina de Turing fue descrita por Alan Turing como una «máquina automática» en 1936 en la revista 
			Proceedings of the London Mathematical Society,1 La máquina de Turing no está diseñada como una tecnología de computación práctica, 
			sino como un dispositivo hipotético que representa una máquina de computación. Las máquinas de Turing ayudan 
			a los científicos a entender los límites del cálculo mecánico. </small></p>
		<p><small>Nuestro objetivo es definir un lenguaje de programación completo (queremos que contenga todas los elem ntos esenciales) 
			y al mismo tiempo minimal (no queremos que contenga ningún elemento no esencial). 
			Un elemento no es esencial cuando puede ser eliminado del lenguaje sin reducir su potencia porque sus funciones pueden ser cubiertas 
			(con mayor o menor eficacia) por el resto de los elementos del lenguaje, y es por tanto esencial cuando hay al menos un algoritmo 
			que puede expresarse utilizando dicho elemento, pero no sin él. Por ejemplo, en un lenguaje de programación no recursivo 
			que cuente con una única estructura cíclica (de tipo loop) y las operaciones numéricas de suma y producto, esta última 
			no es un elemento esencial, puesto que la multiplicación puede ser programada usando el bucle y la suma. Sin embargo 
			la estructura cíclica sí es esencial, puesto que los bucles no pueden ser simulados con otro tipo de construcciones no iterativas,
			 y hay gran número de algoritmos que no pueden expresarse sin estructuras cíclicas</small></p>
        <center>
                <img src="{{ asset('imagenes/turingMachine2.png') }}" width="300" height="200"></img>
        </center>
@stop