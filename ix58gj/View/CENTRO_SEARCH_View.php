<?php
//Clase : CENTRO_SEARCH
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class CENTRO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
			

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '' onblur=""><br>
				 	
				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '' onblur="" ><br>

				 	<?php echo $strings['NOMBRECENTRO']; ?> : <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '15' value = '' onblur="" ><br>
										
					<?php echo $strings['DIRECCIONCENTRO']; ?> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					<?php echo $strings['RESPONSABLECENTRO']; ?> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '40' value = '' onblur="" ><br>

					

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/CENTRO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
