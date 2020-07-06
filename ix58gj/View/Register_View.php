<?php
//Clase : Register
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class Register{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Registro']; ?></h1>	
			<form name = 'Form' action='../Controller/Register_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	<?php echo $strings['Login']; ?> : <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '' onblur="esNoVacio('login')  && comprobarDni('login')" ><br>
					
					<?php echo $strings['Password']; ?> : <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)" ><br>
					
					<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '' onblur="esNoVacio('DNI')  && comprobarDni('DNI')" ><br>

					<?php echo $strings['Nombre']; ?> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '' onblur="esNoVacio('nombre')  && comprobarSoloLetras('nombre',30)" ><br>
					
					<?php echo $strings['Apellidos']; ?> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '' onblur="esNoVacio('apellidos')  && comprobarSoloLetras('apellidos',50)" ><br>
					
					<?php echo $strings['Telefono']; ?> : <input type = 'text' name = 'telefono' id = 'telefono' size = '40' value = '' onblur="esNoVacio('telefono')  && comprobarTelefono('telefono')" ><br>

					<?php echo $strings['Email']; ?> : <input type = 'text' name = 'email' id = 'email' size = '40' value = '' onblur="esNoVacio('email')  && comprobarEmail('email')" ><br>

					<?php echo $strings['Fecha nacimiento']; ?> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' size = '40' value = '' onblur="esNoVacio('FechaNacimiento')" ><br>

					  <p><?php echo $strings['Sexo']; ?>:
					    <input type='radio' name='sexo' value='hombre'> <?php echo $strings['Hombre']; ?>
					    <input type='radio' name='sexo' value='mujer'> <?php echo $strings['Mujer']; ?>
					  </p>

					<input type='submit' name='action' value='REGISTER'>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	