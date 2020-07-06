<?php
//Clase : PROFESOR_SEARCH
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para introducir datos por los cuales se va a buscar
//-------------------------------------------------------
	class PROFESOR_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Profesor'><?php echo $strings['Gestión Profesor']; ?></label></h1>
			<h3><label id='SEARCH'><?php echo $strings['SEARCH']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return validarProfesorSEARCH(this);">
			
				 	

			<label id='DNIl'><?php echo $strings['DNI']; ?> </label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '9' value = '' onblur="comprobarAlfabetico2(this,9)" ><br>
					
			<label id='NOMBREPROFESORl'><?php echo $strings['NOMBREPROFESOR']; ?> </label>: <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '15' value = '' onblur="comprobarAlfabetico2(this, 15)" ><br>
					
			<label id='APELLIDOSPROFESORl'><?php echo $strings['APELLIDOSPROFESOR']; ?> </label>: <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '' onblur="comprobarAlfabetico2(this, 30)" ><br>
					
			<label id='AREAPROFESORl'><?php echo $strings['AREAPROFESOR']; ?> </label>: <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR'  placeholder="<?php echo $strings['Solo letras']; ?>" size = '60' value = '' onblur="comprobarAlfabetico2(this, 60)" ><br>

			<label id='DEPARTAMENTOPROFESORl'><?php echo $strings['DEPARTAMENTOPROFESOR']; ?> </label>: <input type = 'text' name = 'DEPARTAMENTOPROFESOR' placeholder="<?php echo $strings['Solo letras']; ?>" id = 'DEPARTAMENTOPROFESOR' size = '60' value = '' onblur="comprobarAlfabetico2(this, 60)" ><br>
					
					
					<input type="hidden" name="action" value="SEARCH">
  					<input type="image" id="boton" src="../View/Icons/buscar.png" width="40" height="40">

			</form>
			<br></br>
		
			<a href='../Controller/PROFESOR_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	