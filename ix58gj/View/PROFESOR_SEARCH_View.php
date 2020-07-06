<?php
//Clase : PROFESOR_SEARCH
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class PROFESOR_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	//formulario para instroducir los datos para buscar

				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '' onblur="" ><br>
					
					<?php echo $strings['NOMBREPROFESOR']; ?> : <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '30' value = '' onblur="" ><br>
					
					<?php echo $strings['APELLIDOSPROFESOR']; ?> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					<?php echo $strings['AREAPROFESOR']; ?> : <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' size = '40' value = '' onblur="" ><br>

					<?php echo $strings['DEPARTAMENTOPROFESOR']; ?> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' size = '40' value = '' onblur="" ><br>
					
					
					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	