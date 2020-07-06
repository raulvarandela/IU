<?php
//Clase : PROF_TITULACION_DELETE
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para delete
//-------------------------------------------------------
	class PROF_TITULACION_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión  Titulaciones Profesor']; ?></h1>	
			<h3><?php echo $strings['DELETE']; ?></h3>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
		
				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly' onblur="" ><br>

        

                    <?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '30' value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['ANHOACADEMICO']; ?> : <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '<?php echo $this->datos['ANHOACADEMICO']; ?>' readonly='readonly' onblur="" ><br>


					<input type='submit' name='action' value='DELETE'>

			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>

	