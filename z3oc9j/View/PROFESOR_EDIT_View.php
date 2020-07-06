<?php
//Clase : PROFESOR_EDIT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para edit
//-------------------------------------------------------
	class PROFESOR_EDIT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión Profesor']; ?></h1>
			<h3><?php echo $strings['EDIT']; ?></h3>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return validarProfesorEDIT(this)">
			
				 

					<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->datos['DNI']; ?>'readonly='readonly' onblur="" ><br>

					<?php echo $strings['NOMBREPROFESOR']; ?> : <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '20' value = '<?php echo $this->datos['NOMBREPROFESOR']; ?>' onblur="comprobarTexto(this, 20)" ><br>
					
					<?php echo $strings['APELLIDOSPROFESOR']; ?> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '20' value = '<?php echo $this->datos['APELLIDOSPROFESOR']; ?>' onblur="comprobarTexto(this, 20)" ><br>

					<?php echo $strings['AREAPROFESOR']; ?> : <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' size = '20' placeholder="<?php echo $strings['Solo letras']; ?>" value = '<?php echo $this->datos['AREAPROFESOR']; ?>' onblur="comprobarTexto(this, 20)" ><br>

					<?php echo $strings['DEPARTAMENTOPROFESOR']; ?> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR'  placeholder="<?php echo $strings['Solo letras']; ?>" size = '30' value = '<?php echo $this->datos['DEPARTAMENTOPROFESOR']; ?>' onblur="comprobarTexto(this, 20)" ><br>

					

					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	