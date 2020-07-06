<?php
//Clase : PROFESOR_SEARCH
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para search
//-------------------------------------------------------
	class PROFESOR_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Profesor']; ?></h1>
			<h3><?php echo $strings['SEARCH']; ?></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return validarProfesorSEARCH(this);">
			
				 	

				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this,9)" ><br>
					
					<?php echo $strings['NOMBREPROFESOR']; ?> : <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '' onblur="comprobarTexto(this, 20)" ><br>
					
					<?php echo $strings['APELLIDOSPROFESOR']; ?> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this, 20)" ><br>
					
					<?php echo $strings['AREAPROFESOR']; ?> : <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR'  placeholder="<?php echo $strings['Solo letras']; ?>" size = '40' value = '' onblur="comprobarTexto(this, 20)" ><br>

					<?php echo $strings['DEPARTAMENTOPROFESOR']; ?> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' placeholder="<?php echo $strings['Solo letras']; ?>" id = 'DEPARTAMENTOPROFESOR' size = '40' value = '' onblur="comprobarTexto(this, 20)" ><br>
					
					
					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	