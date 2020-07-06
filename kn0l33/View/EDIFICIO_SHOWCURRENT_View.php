<?php
//Clase : EDIFICIO_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario que muestra los detalles de una tupla determinada
//-------------------------------------------------------
	class EDIFICIO_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //muestra los datos
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Edificios'><?php echo $strings['Gestión Edificios']; ?></label></h1>
			<h3><label id='SHOWCURRENT'><?php echo $strings['SHOWCURRENT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	
			<label id='CODEDIFICIO'><?php echo $strings['CODEDIFICIO']; ?> </label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='NOMBREEDIFICIO'><?php echo $strings['NOMBREEDIFICIO']; ?> </label>: <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->datos['NOMBREEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='DIRECCIONEDIFICIO'><?php echo $strings['DIRECCIONEDIFICIO']; ?> </label>: <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '150' value = '<?php echo $this->datos['DIRECCIONEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='CAMPUSEDIFICIO'> <?php echo $strings['CAMPUSEDIFICIO']; ?> </label>: <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '10' value = '<?php echo $this->datos['CAMPUSEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>
				
				
			</form>
			
			

			<form class="form-inline m-0" method='post'>

				<input type = 'hidden' name = 'CODEDIFICIO' id = 'CODEDIFICIO' size = '10' maxlength="10" value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly'><br>

				<div class="div_asociado">
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/CENTRO_Controller.php'><label id='ver centros'><?php echo $strings['ver centros']; ?></label></button>
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/ESPACIO_Controller.php'><label id='ver espacios'><?php echo $strings['ver espacios']; ?></label></button>
				</div>

        	 </form>




			<a href='../Controller/EDIFICIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>

	