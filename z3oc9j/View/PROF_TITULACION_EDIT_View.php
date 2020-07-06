<?php
//Clase : PROF_TITULACION_EDIT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para edit
//-------------------------------------------------------
	class PROF_TITULACION_EDIT{


		function __construct($valores){	//constructor de la clase
			$this->valores = $valores;//valores a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión  Titulaciones Profesor']; ?></h1>	
			<h3><?php echo $strings['EDIT']; ?></h3>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return validarProfTitulacion(this)">
			
					<?php echo $strings['DNI']; ?> :<input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->valores['DNI']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->valores['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['ANHOACADEMICO']; ?> : <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '50' value = '<?php echo $this->valores['ANHOACADEMICO']; ?>' onblur="comprobarAlfabetico(this,20)" ><br>

					
					

					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	