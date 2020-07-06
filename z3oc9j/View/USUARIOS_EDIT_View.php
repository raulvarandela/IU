<?php
//Clase : USUARIOS_EDIT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para edit
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
			<h1><?php echo $strings['Gestión Usuarios']; ?></h1>
			<h3><?php echo $strings['EDIT']; ?></h3>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return validarUsuariosEDIT(this)">
			
				 	<?php echo $strings['Login']; ?> : <input type = 'text' name = 'login' id = 'login' placeholder = '' size = '9' value = '<?php echo $this->datos['login']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['Password']; ?> : <input type = 'text' name = 'password' id = 'password' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '25' value = '<?php echo $this->datos['password']; ?>' onblur="comprobarAlfabetico(this,20)" ><br>

					<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '15' value = '<?php echo $this->datos['DNI']; ?>' onblur="comprobarDni(this)" ><br>

					<?php echo $strings['Nombre']; ?> : <input type = 'text' name = 'nombre' id = 'nombre' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '<?php echo $this->datos['nombre']; ?>' onblur="comprobarTexto(this,20)" ><br>
					
					<?php echo $strings['Apellidos']; ?> : <input type = 'text' name = 'apellidos' id = 'apellidos' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '<?php echo $this->datos['apellidos']; ?>' onblur="comprobarTexto(this,20)" ><br>

					<?php echo $strings['Telefono']; ?> : <input type = 'text' name = 'telefono' id = 'telefono' placeholder='<?php echo $strings['Introduce tu telefono']; ?>' size = '40' value = '<?php echo $this->datos['telefono']; ?>' onblur="comprobarTelf(this)" ><br>

					<?php echo $strings['Email']; ?> : <input type = 'text' name = 'email' id = 'email' placeholder="<?php echo $strings['Introduce tu email']; ?>" size = '40' value = '<?php echo $this->datos['email']; ?>' onblur="comprobarExpresionRegular(this,/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/,20)" ><br>

					<?php echo $strings['Fecha nacimiento']; ?> : <input type = 'date' required name = 'FechaNacimiento' id = 'FechaNacimiento' size = '40' value = '<?php echo $this->datos['FechaNacimiento']; ?>' min="1900-01-01" max="2018-12-31" onblur="" ><br>

					<p><?php echo $strings['Sexo']; ?>:
					    <input type='radio' required name='sexo' value='hombre' <?php if($this->datos['sexo']=='hombre') echo 'checked';?>> <?php echo $strings['Hombre']; ?>
					    <input type='radio' required name='sexo' value='mujer'<?php if($this->datos['sexo']=='mujer') echo 'checked';?> > <?php echo $strings['Mujer']; ?>
					  </p>			

					 

					<input type='submit' name='action' value='EDIT'>

			</form>

		<!--<form action="../Controller/upload.php" method="post" enctype="multipart/form-data">
    			
 				<?php echo $strings['fotopersonal']; ?> : <input type="file" name="fotopersonal" id="fotopersonal" onblur="comprobarExpresionRegular(this, /(.jpeg |.png |.pdf)$/,20);"></p>

    			<input type="submit" value="Upload Image" name="submit">

			</form>	-->
		
			<a href='../Controller/USUARIOS_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	