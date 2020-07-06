<?php
//Clase : USUARIOS_EDIT
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class USUARIOS_EDIT{

		//constructor de la clase
		function __construct($datos){	
			$this->datos = $datos;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	<?php echo $strings['Login']; ?> : <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '<?php echo $this->datos['login']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['Password']; ?> : <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '<?php echo $this->datos['password']; ?>' onblur="" ><br>

					<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->datos['DNI']; ?>' onblur="" ><br>

					<?php echo $strings['Nombre']; ?> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->datos['nombre']; ?>' onblur="" ><br>
					
					<?php echo $strings['Apellidos']; ?> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->datos['apellidos']; ?>' onblur="" ><br>

					<?php echo $strings['Telefono']; ?> : <input type = 'text' name = 'telefono' id = 'telefono' size = '40' value = '<?php echo $this->datos['telefono']; ?>' onblur="" ><br>

					<?php echo $strings['Email']; ?> : <input type = 'text' name = 'email' id = 'email' size = '40' value = '<?php echo $this->datos['email']; ?>' onblur="" ><br>

					<?php echo $strings['Fecha nacimiento']; ?> : <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' size = '40' value = '<?php echo $this->datos['FechaNacimiento']; ?>' onblur="" ><br>

					<p><?php echo $strings['Sexo']; ?>:
					    <input type='radio' name='sexo' value='hombre' <?php if($this->datos['sexo']=='hombre') echo 'checked';?>> <?php echo $strings['Hombre']; ?>
					    <input type='radio' name='sexo' value='mujer'<?php if($this->datos['sexo']=='mujer') echo 'checked';?> > <?php echo $strings['Mujer']; ?>
					  </p>			


					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	