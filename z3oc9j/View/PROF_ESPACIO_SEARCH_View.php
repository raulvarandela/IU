<?php
//Clase : PROF_ESPACIO_SEARCH
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para search
//-------------------------------------------------------
	class PROF_ESPACIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión  Espacio Profesor']; ?></h1>
			<h3><?php echo $strings['SEARCH']; ?></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return validarProfEspacioSEARCH(this);">
			
				 	
				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this,9)" ><br>
					
					<?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '30' value = '' onblur="comprobarAlfabetico(this,20)" ><br>
					
					
					
					
					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	