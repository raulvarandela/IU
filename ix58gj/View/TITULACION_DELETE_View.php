<?php
//Clase : TITULACION_DELETE
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class TITULACION_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['DELETE']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	

                    <?php echo $strings['CODTITULACION']; ?>  : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '30' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '<?php echo $this->datos['NOMBRETITULACION']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '40' value = '<?php echo $this->datos['RESPONSABLETITULACION']; ?>' readonly='readonly' onblur="" ><br>


					<input type='submit' name='action' value='DELETE'>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>
