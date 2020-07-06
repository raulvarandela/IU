<?php
//Clase : USUARIOS_SEARCH
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para introducir datos por los cuales se va a buscar
//-------------------------------------------------------
	class USUARIOS_SEARCH{

		//constructor de la clase
		function __construct(){	
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Usuarios'><?php echo $strings['Gestión Usuarios']; ?></label></h1>
			<h3><label id='SEARCH'><?php echo $strings['SEARCH']; ?></label></h3>	

			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return validarUsuariosSEARCH(this);">
			
			<label id='Loginl'><?php echo $strings['Login']; ?></label> : <input type = 'text' name = 'login' id = 'login' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarExpresionRegular(this,/^([A-Za-z]*)$/,15)" ><br>
				 	
			<label id='Passwordl'><?php echo $strings['Password']; ?></label> : <input type = 'text' name = 'password' id = 'password' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarExpresionRegular(this,/^([A-Za-z]*)$/,15)" ><br>

			<label id='DNIl'><?php echo $strings['DNI']; ?></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder="<?php echo $strings['Introduce tu DNI']; ?>" size = '9' value = '' onblur="comprobarAlfabetico2(this,9)" ><br>
					
			<label id='Nombrel'><?php echo $strings['Nombre']; ?> </label>: <input type = 'text' name = 'nombre' id = 'nombre'  placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '' onblur="comprobarTexto2(this,30);" ><br>
					
			<label id='Apellidosl'><?php echo $strings['Apellidos']; ?> </label>: <input type = 'text' name = 'apellidos' id = 'apellidos'  placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto2(this,50);" ><br>
					
			<label id='Telefonol'><?php echo $strings['Telefono']; ?></label> : <input type = 'text' name = 'telefono' id = 'telefono' placeholder="<?php echo $strings['Introduce tu telefono']; ?>" size = '11' value = '' onblur="comprobarTelf(this);" ><br>

			<label id='Emaill'><?php echo $strings['Email']; ?> </label>: <input type = 'text' name = 'email' id = 'email' size = '60' placeholder="<?php echo $strings['Introduce tu email']; ?>" value = '' onblur="comprobarExpresionRegular(this,/^[a-zA-Z0-9_-]{1,}@[a-zA-Z0-9\.]{1,}(.com|.es)$/,60);" ><br>
					
			<label id='Fecha nacimientol'><?php echo $strings['Fecha nacimiento']; ?> </label>: <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' size = '' value = '' onblur="alwaysTrue(this);" min="1900-01-01" max="2018-12-31"><br>

			<label id='fotopersonall'><?php echo $strings['fotopersonal']; ?></label> : <input type = 'text' name = 'fotopersonal' id = 'fotopersonal' size = '50' value = '' placeholder='<?php echo $strings['Solo letras']; ?>' onblur="comprobarAlfabetico2(this,50)" ><br>

					
			<label id='sexo'><?php echo $strings['sexo']; ?></label> :
					  <select  name='sexo' id='sexo' onblur="alwaysTrue(this);">
                                    <option value='' selected> </option>
                                    <option value="hombre"><label id='Hombre'><?php echo $strings['Hombre']; ?></label></option>
                                    <option value="mujer"><label id='Mujer'><?php echo $strings['Mujer']; ?></label></option>
                                </select> <br>

					  <input type="hidden" name="action" value="SEARCH">
  					<input type="image" id="boton" src="../View/Icons/buscar.png" width="40" height="40">
			</form>
				<br>
		</br>
		
			<a href='../Controller/USUARIOS_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	