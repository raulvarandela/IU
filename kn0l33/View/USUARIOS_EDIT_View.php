<?php
//Clase : USUARIOS_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
//-------------------------------------------------------
	class USUARIOS_EDIT{

		//constructor de la clase
		function __construct($datos){	
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Usuarios'><?php echo $strings['Gestión Usuarios']; ?></label></h1>
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' enctype="multipart/form-data" method='post' onsubmit="return validarUsuariosEDIT(this)">
			
			<label id='Loginl'><?php echo $strings['Login']; ?></label> : <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '15' value = '<?php echo $this->datos['login']; ?>' readonly='readonly' onblur="" ><br>

			<label id='Passwordl'><?php echo $strings['Password']; ?></label> : <input type = 'text' name = 'password' id = 'password' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '15' value = '<?php echo $this->datos['password']; ?>' onblur="comprobarExpresionRegular(this,/^([A-Za-z]{3,})$/,15)" ><br>

			<label id='DNIl'><?php echo $strings['DNI']; ?></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '9' value = '<?php echo $this->datos['DNI']; ?>' onblur="comprobarDni(this)" ><br>

			<label id='Nombrel'><?php echo $strings['Nombre']; ?> </label>: <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '<?php echo $this->datos['nombre']; ?>' onblur="comprobarTexto(this,30)" ><br>
					
			<label id='Apellidosl'><?php echo $strings['Apellidos']; ?></label> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '<?php echo $this->datos['apellidos']; ?>' onblur="comprobarTexto(this,50)" ><br>

			<label id='Telefonol'><?php echo $strings['Telefono']; ?> </label>: <input type = 'text' name = 'telefono' id = 'telefono' placeholder='<?php echo $strings['Introduce tu telefono']; ?>' size = '11' value = '<?php echo $this->datos['telefono']; ?>' onblur="comprobarTelf(this)" ><br>

			<label id='Emaill'><?php echo $strings['Email']; ?></label> : <input type = 'text' name = 'email' id = 'email' placeholder="<?php echo $strings['Introduce tu email']; ?>" size = '60' value = '<?php echo $this->datos['email']; ?>' onblur="comprobarExpresionRegular(this,/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/,60)" ><br>

			<label id='Fecha nacimientol'>	<?php echo $strings['Fecha nacimiento']; ?> </label>: <input type = 'date'  name = 'FechaNacimiento' id = 'FechaNacimiento' size = '' value = '<?php echo $this->datos['FechaNacimiento']; ?>' min="1900-01-01" max="2018-12-31" onblur="comprobarVacio(this)" ><br>

			<label id='actual'>	<?php echo $strings['actual'];?> </label>: <a href='<?php echo $this->datos['fotopersonal']; ?>' ><input type='text' name='fotopersonal'  size = '50' value='<?php echo $this->datos['fotopersonal']; ?>' readonly></a> <br><br>
			<label id='nueva'>	<?php echo $strings['nueva'];?> </label>: <input type = 'file' name = 'fotopersonal' id = 'fotopersonal'  size = '50' value = '<?php echo $this->datos['fotopersonal']; ?>' onblur=""><br><br>


					<p><label id='Sexol'><?php echo $strings['Sexo']; ?></label>:
					    <input type='radio'  name='sexo' value='hombre' <?php if($this->datos['sexo']=='hombre') echo 'checked';?>> <label id='Hombre'><?php echo $strings['Hombrel']; ?></label>
					    <input type='radio'  name='sexo' value='mujer'<?php if($this->datos['sexo']=='mujer') echo 'checked';?> > <label id='Mujer'><?php echo $strings['Mujerl']; ?></label>
					  </p>			
					
					 
					   

					  <input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">

			</form>
<br> </br>
		
		
			<a href='../Controller/USUARIOS_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	