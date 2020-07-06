<?php
//Clase : PROF_TITULACION_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
//-------------------------------------------------------
	class PROF_TITULACION_EDIT{


		function __construct($valores){	//constructor de la clase
			$this->valores = $valores;//valores a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Titulaciones Profesor'><?php echo $strings['Gestión  Titulaciones Profesor']; ?></label></h1>	
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return validarProfTitulacion(this)">
			
			<label id='DNIl'><?php echo $strings['DNI']; ?> </label>:<input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' value = '<?php echo $this->valores['DNI']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODTITULACIONl'><?php echo $strings['CODTITULACION']; ?> </label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' value = '<?php echo $this->valores['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

			<label id='ANHOACADEMICOl'><?php echo $strings['ANHOACADEMICO']; ?> </label>: <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '<?php echo $this->valores['ANHOACADEMICO']; ?>' onblur="comprobarExpresionRegular(this,/[0-9]{4}[-][0-9]{4}/,9);" ><br>

					
					

					<input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">
			</form>
			<br></br>
		
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	