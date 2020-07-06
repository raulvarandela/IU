<?php
	//Clase : USUARIOS_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario que muestra los detalles de una tupla determinada
//-------------------------------------------------------
	class USUARIOS_SHOWCURRENT{

		//constructor de la clase
		function __construct($datos){	
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Usuarios'><?php echo $strings['Gestión Usuarios']; ?></label></h1>
			<h3><label id='SHOWCURRENT'><?php echo $strings['SHOWCURRENT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
			<label id='Login'><?php echo $strings['Login']; ?></label> : <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '<?php echo $this->datos['login']; ?>' readonly='readonly' onblur="" ><br>

			<label id='Password'> <?php echo $strings['Password']; ?></label> : <input type = 'text' name = 'password' id = 'password' placeholder = '' size = '15' value = '<?php echo $this->datos['password']; ?>' readonly='readonly' onblur="" ><br>

			<label id='DNI'><?php echo $strings['DNI']; ?></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly' onblur="" ><br>

			<label id='Nombre'><?php echo $strings['Nombre']; ?></label> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '' size = '30' value = '<?php echo $this->datos['nombre']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='Apellidos'><?php echo $strings['Apellidos']; ?></label> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '' size = '50' value = '<?php echo $this->datos['apellidos']; ?>' readonly='readonly' onblur="" ><br>

			<label id='Telefono'> <?php echo $strings['Telefono']; ?></label> : <input type = 'text' name = 'telefono' id = 'telefono' size = '40' value = '<?php echo $this->datos['telefono']; ?>' readonly='readonly' onblur="" ><br>

			<label id='Email'> <?php echo $strings['Email']; ?> </label>: <input type = 'text' name = 'email' id = 'email' size = '40' value = '<?php echo $this->datos['email']; ?>' readonly='readonly' onblur="" ><br>

			<label id='Fecha nacimiento'>   <?php echo $strings['Fecha nacimiento']; ?></label>: <input type = 'date' name = 'FechaNacimiento' id = 'FechaNacimiento' size = '40' value = '<?php echo $this->datos['FechaNacimiento']; ?>' readonly='readonly' onblur="" ><br>

			<label id='fotopersonal'>	<?php echo $strings['fotopersonal'];?></label>: <a href='<?php echo $this->datos['fotopersonal']; ?>' ><input type='text' id="fotopersonal" name='fotopersonal'  size = '50' value='<?php echo $this->datos['fotopersonal']; ?>' readonly></a><br>

                    <p><label id='Sexo'><?php echo $strings['Sexo']; ?></label>:
                        <input type='radio' name='sexo' value='hombre' <?php if($this->datos['sexo']=='hombre') echo 'checked';?> disabled> <label id='Hombre'><?php echo $strings['Hombre']; ?></label>
                        <input type='radio' name='sexo' value='mujer' <?php if($this->datos['sexo']=='mujer') echo 'checked';?> disabled> <label id='Mujer'><?php echo $strings['Mujer']; ?></label>
                      </p>

		
			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>
	