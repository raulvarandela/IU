<?php
//Clase : PROF_ESPACIO_SEARCH
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class PROF_ESPACIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	
				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '' onblur="" ><br>
					
					<?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '30' value = '' onblur="" ><br>
					
					
					
					
					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	