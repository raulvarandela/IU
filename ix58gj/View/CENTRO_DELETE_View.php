<?php
//Clase : CENTRO_DELETE
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class CENTRO_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['DELETE']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['NOMBRECENTRO']; ?> : <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '30' value = '<?php echo $this->datos['NOMBRECENTRO']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['DIRECCIONCENTRO']; ?> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '50' value = '<?php echo $this->datos['DIRECCIONCENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['RESPONSABLECENTRO']; ?> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '40' value = '<?php echo $this->datos['RESPONSABLECENTRO']; ?>' readonly='readonly' onblur="" ><br>


					<input type='submit' name='action' value='DELETE'>

			</form>
				
		
			<a href='../Controller/CENTRO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>
