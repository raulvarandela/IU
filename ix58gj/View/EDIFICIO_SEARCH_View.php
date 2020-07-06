<?php
//Clase : EDIFICIO_SEARCH
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class EDIFICIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 
				 	
				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '' onblur="" ><br>

				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '15' value = '' onblur="" ><br>
										
					<?php echo $strings['DIRECCIONEDIFICIO']; ?> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					<?php echo $strings['CAMPUSEDIFICIO']; ?> : <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '40' value = '' onblur="" ><br>

					

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/EDIFICIO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
