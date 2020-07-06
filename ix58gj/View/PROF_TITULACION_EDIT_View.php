<?php
//Clase : PROF_TITULACION_EDIT
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class PROF_TITULACION_EDIT{


		function __construct($valores){	//constructor de la clase
			$this->valores = $valores;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					<?php echo $strings['DNI']; ?> :<input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->valores['DNI']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->valores['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['ANHOACADEMICO']; ?> : <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '<?php echo $this->valores['ANHOACADEMICO']; ?>' onblur="" ><br>

					
					

					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	