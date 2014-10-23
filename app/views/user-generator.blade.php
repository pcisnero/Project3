<?php
require_once '../src/autoload.php';
	//Incluir el archivo autoload.php el '../' es para hacer referencia que como nos encontramos en el directorio 'app'
	//éste archivo está ubicado en el directorio raíz en la carpeta 'src', por lo que '../' es para regresar un nivel o directorio
	//linea definida en 'Basic Usage' en https://github.com/fzaninotto/Faker/tree/master (docs paquete)
$faker = Faker\Factory::create();
	//Se define la instancia para la clase php que genera usuarios
	//linea definida en 'Basic Usage' en https://github.com/fzaninotto/Faker/tree/master (docs paquete)
	
	$value = Input::get('submit');
	//Asignamos a la variable $value el valor del botón submit
	//si no se ha realizado el submit devuelve un valor nulo

	$users = e(Input::get('users'));
	//Obtiene el valor de los usuarios definidos en el input con el nombre de 'users' una vez
	//que hace el submit, de lo contrario  el valor es nulo.
	
	$birthdate = e(Input::get('birthdate'));	//Se obtiene la variable del iput 'birthdate' y se asigna a la variable $birthdate
	$profile = e(Input::get('profile'));		//Se obtiene la variable del iput 'profile' y se asigna a la variable $profile
	$phone = e(Input::get('phone'));			//Se obtiene la variable del iput 'phone' y se asigna a la variable $phone

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Generator</title>
    
    <meta name='viewport' content='width=device-width, initial-scale=1'>	
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/journal/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="{{ URL::asset('/') }}css/mystyle.css" />
    


</head>    
<body>
  	
    <div class='container'>		
	
	<h1>User Generator</h1>
	
				{{ Form::open() }}
                <!--
                Código para abrir un formulario equivale a: 
                <form method="POST" action="ruta definida en localhost" accept-charset="UTF-8">
                
                Éste codigo da por default un campo 'hidden' utilizado para seguridad de la sesión y datos enviados
                <input name="_token" type="hidden" value="RqlOgECVhCoLu6O0T1yTswNQthUAlgFJmRxBwtAp"> 
                -->
 
                {{ Form::label('users', 'How many users?') }}
                <!--Form::label ('nombre del input', 'Valor del label') -->
                <!--Código para definir la etiqueta o texto para el campo (input) 'ussers' equivale a:
                <label for="users">How many users?</label>
                -->
                
                {{ Form::text('users', '5', array('id' => 'users', 'maxlength' => 2,)) }} (Maximum: 99)
                <!--Form::text ('nombre del input', 'Valor', array('id' =>'nombre id', 'propiedad input' => valor) -->
                <!--Código para definir  el campo (input) 'users', en array se definen otras propiedades y valores
                como id y maxlength (como el ejemplo), los valores texto van entre '' y valores numéricos sin ''.
                                
                equivale a:
                <input id="users" maxlength="2" name="users" type="text" value="5">
                -->
                
                <br>
 
          
        
				<br>
                {{ Form::checkbox('birthdate') }} {{ Form::label('birthdate', 'Birthdate') }}<br>
                <!--Form::checkbox ('nombre del input'), Form::label('nombre del input', 'Valor del label') -->
                <!--Código para definir el nombre del checkbox 'birthdate' y su etiqueta o texto 'Birthdate' equivale a:
                <input name="birthdate" type="checkbox" value="1"> <label for="birthdate">Birthdate</label>
                -->
                
                {{ Form::checkbox('profile') }} {{ Form::label('profile', 'Profile') }}<br>
                <!--Código para definir el nombre del checkbox 'profile' y su etiqueta o texto 'Profile' equivale a:
                <input name="profile" type="checkbox" value="1"> <label for="profile">Profile</label>
                -->
                
                {{ Form::checkbox('phone') }} {{ Form::label('phone', 'Phone Number') }}<br>
                <!--Código para definir el nombre del checkbox 'phone' y su etiqueta o texto 'Phone Number' equivale a:
                <input name="phone" type="checkbox" value="1"> <label for="phone">Phone Number</label>
                -->
                
                {{ Form::token()}}<!-- Se genera un input tipo hidden (ésto por el código extraído del ejemplo) -->
                
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
 			
            <a href='/'>&larr; Go Back!</a>	
        
        <hr> <!-- Separador -->
     <?php 	
	 if ($value) {
	//Condicional para validaciones. 
	//Si se ha realizado el submit, la variable $value arroja un valor (el valor del botón submit)
	//Si contiene algun valor, es verdadero (true) y entra a la condicional.
			
			if (($users=='0')||($users==null))	{
			//Condicional: si la variable $users es igual a '0' ó (operador ||) $ussers es valor nulo
			//enviará el siguiente mensaje
			
				echo "Required value at least 1";
			
			
			}else{
			//Si la variable $users contiene un valor válido imprime los usuarios
			
			/***INICIO DE CICLO FOR***/	 	 
			 //Para hacer la impresión de usuarios, se utiliza un ciclo for y se toma como referencia 
			 //la variable $users (definida al inicio), que contiene el valor de los usuarios.
			 for ($i=0; $i < $users; $i++) {
				 //$i=0;-->se inicia una variable denominada $i con valor '0' para el número de veces que imprime los usuarios.
				 //$i < $users;-->se condiciona repetir dicho ciclo siempre que $i sea menor (<) que la variable $users.
				 //$i++ -->una vez que realiza un ciclo, imprime el valor y verifica que sea menor, aumenta un valor en $i para
				 //continuar imprimiendo valores
				 
				 echo "<b>".$faker->name, "</b><br>";
					//Código para imprimir en negritas '<b>' (puede colocarse un div o spam para el estilo) el nombre del usuario
					//$faker->name --> llama a la clase $faker para que imprima 'name' (definido en sus funciones)	
					
					//Condicionales para mostrar valores si los checkbox están seleccionados
					
					 if ($birthdate!=null){
					 // Si la variable $birthdate es diferente (!=) de un valor nulo entonces...
						echo $faker->date($format = 'Y-m-d', $max = 'now'), "<br>";
						//imprime la fecha de nacimiento con formato 'Y-m-d' teniendo como máximo la fecha actual
						//clase $fake->date() llamando a la función date(formato)
					 }			 
					 if($profile!=null){
					 // Si la variable $profile es diferente (!=) de un valor nulo entonces...
						echo "<em>".$faker->text($maxNbChars = 150), "</em><br>";
						//imprime un texto donde el máximo de caracteres son 150
						//clase $fake->text() llamando a la función text(valores)
					 }			 
					 if($phone!=null){
					 // Si la variable $phone es diferente (!=) de un valor nulo entonces...
						echo "Phone: ".$faker->phoneNumber, "<br>";
						//imprime un número telefónico con formato definido en la clase
						//clase $fake->phoneNumber() llamando a la función phoneNumber()
					 }
					 
					 
				echo '<br>';
				//espacio para separar la impresión de los usuarios	 
			 }
			 /***FIN DE CICLO FOR***/
			
			}
	} 
	 
	?>
     
     	
	</div>
 
               <img src=' {{ URL::asset('images/cat.jpg') }} ' alt='Company Logo'>
</body>
</html>          