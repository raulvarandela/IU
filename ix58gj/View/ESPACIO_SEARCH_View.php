<?php
//Clase : ESPACIO_SEARCH
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class ESPACIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['SEARCH']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					

				 	<?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '9' value = '' onblur=""><br>

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '' onblur=""><br>
				 	
				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '' onblur="" ><br>

				 	<p><?php echo $strings['TIPO']; ?>:
					    <input type='radio' name='TIPO' value='DESPACHO'> <?php echo $strings['Despacho']; ?>
					    <input type='radio' name='TIPO' value='LABORATORIO'> <?php echo $strings['Laboratorio']; ?>
					    <input type='radio' name='TIPO' value='PAS'>  <?php echo $strings['PAS']; ?>
					  </p>
										
					<?php echo $strings['SUPERFICIEESPACIO']; ?> : <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					<?php echo $strings['NUMINVENTARIOESPACIO']; ?> : <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '40' value = '' onblur="" ><br>

					

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
