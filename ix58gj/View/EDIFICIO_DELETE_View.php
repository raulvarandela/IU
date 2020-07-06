<?php
//Clase : EDIFICIO_DELETE
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class EDIFICIO_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['DELETE']; ?></h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	

                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '30' value = '<?php echo $this->datos['NOMBREEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['DIRECCIONEDIFICIO']; ?> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->datos['DIRECCIONEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CAMPUSEDIFICIO']; ?> : <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '40' value = '<?php echo $this->datos['CAMPUSEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>


					<input type='submit' name='action' value='DELETE'>

			</form>
				
		
			<a href='../Controller/EDIFICIO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>
