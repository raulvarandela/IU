<?php
//Clase : PROFESOR_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
//-------------------------------------------------------
	class PROFESOR_EDIT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Profesor'><?php echo $strings['Gestión Profesor']; ?></label></h1>
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return validarProfesorEDIT(this)">
			
				 

			<label id='DNIl'><?php echo $strings['DNI']; ?> </label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' value = '<?php echo $this->datos['DNI']; ?>'readonly='readonly' onblur="" ><br>

			<label id='NOMBREPROFESORl'><?php echo $strings['NOMBREPROFESOR']; ?> </label>: <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '15' value = '<?php echo $this->datos['NOMBREPROFESOR']; ?>' onblur="comprobarTexto(this, 15)" ><br>
					
			<label id='APELLIDOSPROFESORl'><?php echo $strings['APELLIDOSPROFESOR']; ?></label> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '<?php echo $this->datos['APELLIDOSPROFESOR']; ?>' onblur="comprobarTexto(this, 30)" ><br>

			<label id='AREAPROFESORl'><?php echo $strings['AREAPROFESOR']; ?> </label>: <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' size = '60' placeholder="<?php echo $strings['Solo letras']; ?>" value = '<?php echo $this->datos['AREAPROFESOR']; ?>' onblur="comprobarTexto(this, 60)" ><br>

			<label id='DEPARTAMENTOPROFESORl'><?php echo $strings['DEPARTAMENTOPROFESOR']; ?> </label>: <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR'  placeholder="<?php echo $strings['Solo letras']; ?>" size = '60' value = '<?php echo $this->datos['DEPARTAMENTOPROFESOR']; ?>' onblur="comprobarTexto(this, 60)" ><br>

					

					<input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">

			</form>
			<br></br>
		
			<a href='../Controller/PROFESOR_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	