<?php
//Clase : TITULACION_SEARCH
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class TITULACION_SEARCH{


		function __construct(){	//constructro de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	
				 	
				 	<?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '' onblur="" ><br>

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '15' value = '' onblur="" ><br>
										
					<?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					<?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '40' value = '' onblur="" ><br>

					

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
