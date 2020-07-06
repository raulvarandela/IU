<?php
//Clase : EDIFICIO_SEARCH
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de search
//-------------------------------------------------------
	class EDIFICIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Edificios']; ?></h1>
			<h3><?php echo $strings['SEARCH']; ?></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return validarEdificoSEARCH(this);">
			
				 
				 	
				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this,20)" ><br>

				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '15' value = '' onblur="comprobarTexto(this,20)" ><br>
										
					<?php echo $strings['DIRECCIONEDIFICIO']; ?> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this,20)" ><br>
					
					<?php echo $strings['CAMPUSEDIFICIO']; ?> : <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '40' value = '' onblur="comprobarTexto(this,20)" ><br>

					

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/EDIFICIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
