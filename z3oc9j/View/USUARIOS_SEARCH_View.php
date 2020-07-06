<?php
//Clase : USUARIOS_SEARCH
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para search
//-------------------------------------------------------
	class USUARIOS_SEARCH{

		//constructor de la clase
		function __construct(){	
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Usuarios']; ?></h1>
			<h3><?php echo $strings['SEARCH']; ?></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return validarUsuariosSEARCH(this);">
			
				 	<?php echo $strings['Login']; ?> : <input type = 'text' name = 'login' id = 'login' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '' onblur="comprobarAlfabetico(this, 20);" ><br>
				 	
				 	 <?php echo $strings['Password']; ?> : <input type = 'text' name = 'password' id = 'password' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this, 20);" ><br>

				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder="<?php echo $strings['Introduce tu DNI']; ?>" size = '15' value = '' onblur="comprobarAlfabetico(this,9)" ><br>
					
					<?php echo $strings['Nombre']; ?> : <input type = 'text' name = 'nombre' id = 'nombre'  placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '' onblur="comprobarTexto(this,20);" ><br>
					
					<?php echo $strings['Apellidos']; ?> : <input type = 'text' name = 'apellidos' id = 'apellidos'  placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this,20);" ><br>
					
					<?php echo $strings['Telefono']; ?> : <input type = 'text' name = 'telefono' id = 'telefono' placeholder="<?php echo $strings['Introduce tu telefono']; ?>" size = '40' value = '' onblur="comprobarTelf(this);" ><br>

					<?php echo $strings['Email']; ?> : <input type = 'text' name = 'email' id = 'email' size = '40' placeholder="<?php echo $strings['Introduce tu email']; ?>" value = '' onblur="comprobarExpresionRegular(this,/^[a-zA-Z0-9_-]{1,}@[a-zA-Z0-9\.]{1,}(.com|.es)$/,20);" ><br>
					
					<?php echo $strings['Fecha nacimiento']; ?> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' size = '40' value = '' onblur="" min="1900-01-01" max="2018-12-31"><br>

					<p><?php echo $strings['Sexo']; ?>:
					    <input type='radio' name='sexo' value='hombre'> <?php echo $strings['Hombre']; ?>
					    <input type='radio' name='sexo' value='mujer'> <?php echo $strings['Mujer']; ?>
					  </p>

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	