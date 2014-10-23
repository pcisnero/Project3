<?php
$value = e(Input::get('submit'));
	//Asignamos a la variable $value el valor del botón submit
	//si no se ha realizado el submit devuelve un valor nulo
$paragraphs = e(Input::get('paragraphs'));	
	//Obtiene la variable de los párrafos definidos en el input con el nombre de 'paragraphs' una vez
	//que hace el submit, de lo contrario  el valor es nulo.

$generator = new Badcow\LoremIpsum\Generator();   
	//Se define la instancia de la clase del generador de texto en $generator

$result = $generator->getParagraphs($paragraphs);  
				//$generator-> llama a la clase php que contiene las funciones para generar el texto
				//getParagraphs es el nombre de la función que hace posible generar el texto
				//($paragraphs); es el valor obtenido en la linea 2 del input del formulario (valor 5)
				//Se envía el resultado a $result,
		
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lorem Ipsum Generator</title>
    
    <meta name='viewport' content='width=device-width, initial-scale=1'>	
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/journal/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="{{ URL::asset('/') }}css/mystyle.css" />
    
	<!-- estilos y estructura extraída de página de ejemplo-->

</head>    
<body>

  	<div class='container'>
	
	<h1>Lorem Ipsum Generator</h1>
	
  
  				{{ Form::open() }} 
                <!--
                Código para abrir un formulario equivale a: 
                <form method="POST" action="ruta definida en localhost" accept-charset="UTF-8">
                
                Éste codigo da por default un campo 'hidden' utilizado para seguridad de la sesión y datos enviados
                <input name="_token" type="hidden" value="RqlOgECVhCoLu6O0T1yTswNQthUAlgFJmRxBwtAp"> 
                -->
                 
                {{ Form::label('paragraphs', 'Paragraphs') }}
                <!--Form::label ('nombre del input', 'Valor del label') -->
                <!--Código para definir la etiqueta o texto para el campo (input) 'pharagraphs' equivale a:
                <label for="paragraphs">Paragraphs</label>
                -->
                
                {{ Form::text( 'paragraphs', '5', array('id' => 'paragraphs', 'maxlength' => 2,)) }} (Maximum: 99)
                <!--Form::text ('nombre del input', 'Valor', array('id' =>'nombre id', 'propiedad input' => valor) -->
                <!--Código para definir  el campo (input) 'pharagraphs', en array se definen otras propiedades y valores
                como id y maxlength (como el ejemplo), los valores texto van entre '' y valores numéricos sin ''.
                                
                equivale a:
                <input id="paragraphs" maxlength="2" name="paragraphs" type="text" value="5">
                -->
                
 				<br>
                {{ Form::submit('Generate', array('name' => 'submit')) }} 
                <!--
                Código para definir el valor del botón submit (texto del botón): 'Generate' y el nombre: 'submit'.
                Equivale a:
                <input type="submit" value="Generate" name="submit">
                -->
                
                {{ Form::close() }}
                <!--
                Código para cerrar el formulario equivale a: </form> 
                -->
                
 		<hr> <!-- Separador -->
        <a href='/'>&larr; Go back!</a>
        <hr> <!-- Separador -->
   <?php 
				
	if ($value) {
	//Condicional para validaciones. 
	//Si se ha realizado el submit, la variable $value arroja un valor (el valor del botón submit)
	//Si contiene algun valor, es verdadero (true) y entra a la condicional.
			
			if (($paragraphs=='0')||($paragraphs==null))	{
			//Condicional: si la variable $paragraphs es igual a '0' ó (operador ||) $paragraphs es valor nulo
			//enviará el siguiente mensaje
			
				echo "Required value at least 1";
			
			
			}else{
			//Si la variable $paragraphs contiene un valor válido imprime el texto
		
			echo implode('<p>', $result); 
				//implode es utilizado para imprimir los textos en párrafos <p>
				//la variable $result, contiene los textos lorem ipsum a imprimir o mostrar
				// si $result está vacio o el valor es nulo no muestra nada
			}
	} 
		
	?>
		
	</div>
      
            
               <img src=' {{ URL::asset('images/cat.jpg') }} ' alt='Company Logo'>


    
</body>
</html>


 
        
        
                