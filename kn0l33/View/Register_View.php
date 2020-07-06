<?php
//Clase : Register_View
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario para registrarse
//-------------------------------------------------------
	class Register{


		function __construct(){	//constructor de la clase
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><label id='Registro'><?php echo $strings['Registro']; ?></label></h1>	
			<form name = 'Form' action='../Controller/Register_Controller.php' enctype="multipart/form-data" method='post' onsubmit="return validarRegistro(this);">
			
			<label id='Login'>	<?php echo $strings['Login']; ?> </label>: <input type = 'text' name = 'login' id = 'login' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarExpresionRegular(this,/^([A-Za-z]{3,})$/,15)" ><br>
					
			<label id='Password'><?php echo $strings['Password']; ?> </label>: <input type = 'password' name = 'password' id = 'password' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarExpresionRegular(this,/^([A-Za-z]{3,})$/,15)" ><br>
					
			<label id='DNI'><?php echo $strings['DNI']; ?></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '9' value = '' onblur="comprobarDni(this);" ><br>

			<label id='Nombre'>	<?php echo $strings['Nombre']; ?> </label>: <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '' onblur="comprobarTexto(this,30);" ><br>
					
			<label id='Apellidos'><?php echo $strings['Apellidos']; ?> </label>: <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this, 50);" ><br>
					
			<label id='Telefono'><?php echo $strings['Telefono']; ?> </label>: <input type = 'text' name = 'telefono' id = 'telefono' placeholder="<?php echo $strings['Introduce tu telefono']; ?>" size = '11' value = '' onblur="comprobarTelf(this);" ><br>

			<label id='Email'><?php echo $strings['Email']; ?> </label>: <input type = 'text' name = 'email' id = 'email' placeholder="<?php echo $strings['Introduce tu email']; ?>" size = '60' value = '' onblur="comprobarExpresionRegular(this,/^[a-zA-Z0-9_-]{1,}@[a-zA-Z0-9\.]{1,}(.com|.es)$/,60);" ><br>

			<label id='Fecha nacimiento'><?php echo $strings['Fecha nacimiento']; ?> </label>: <input type = 'date'  name = 'FechaNacimiento' id = 'FechaNacimiento' size = '' value = '' onblur="" min="1900-01-01" max="2018-12-31" ><br>

					
					  <p><label id='Sexo'><?php echo $strings['Sexo']; ?></label>:
					    <input type='radio'  name='sexo' value='hombre'><label id='Hombre'> <?php echo $strings['Hombre']; ?></label>
					    <input type='radio'  name='sexo' value='mujer'><label id='Mujer'> <?php echo $strings['Mujer']; ?></label>
					  </p>

					  <label id='fotopersonal'> <?php echo $strings['fotopersonal'];?> </label>: <input type = 'file' name = 'fotopersonal' id = 'fotopersonal'  size = '50' value = '' onblur="">
					<br>
					<br>
					<input type='hidden' name='action' value='REGISTER'>
					<input type="image" id="boton" src="../View/Icons/registrar.png" width="50" height="50">

			</form>
				
		
			<a href='../Controller/Index_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	