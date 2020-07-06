<?php
//Clase : CENTRO_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario que muestra los detalles de una tupla determinada
//-------------------------------------------------------
	class CENTRO_SHOWCURRENT{


		function __construct($datos){	//contructor de la clase
			$this->datos = $datos; //datos que se muestran
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Centros'><?php echo $strings['Gestión Centros']; ?></label></h1>
			<h3><label id='SHOWCURRENT'><?php echo $strings['SHOWCURRENT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
					

			<label id='CODCENTRO'><?php echo $strings['CODCENTRO']; ?></label> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODEDIFICIO'> <?php echo $strings['CODEDIFICIO']; ?> </label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='NOMBRECENTRO'> <?php echo $strings['NOMBRECENTRO']; ?> </label>: <input type = 'text' name = 'DNOMBRECENTROI' id = 'NOMBRECENTRO' placeholder = '' size = '50' value = '<?php echo $this->datos['NOMBRECENTRO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='DIRECCIONCENTRO'> <?php echo $strings['DIRECCIONCENTRO']; ?> </label>: <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '150' value = '<?php echo $this->datos['DIRECCIONCENTRO']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='RESPONSABLECENTRO'>  <?php echo $strings['RESPONSABLECENTRO']; ?> </label>: <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '60' value = '<?php echo $this->datos['RESPONSABLECENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    

				
		
			</form>
				
			<form class="form-inline m-0" method='post'>

				<input type = 'hidden' name = 'CODCENTRO' id = 'CODCENTRO' size = '10' maxlength="10" value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly'><br>

				<div class="div_asociado">
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/TITULACION_Controller.php'><label id='ver titulaciones'><?php echo $strings['ver titulaciones']; ?></label></button>
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/ESPACIO_Controller.php'><label id='ver espacios'><?php echo $strings['ver espacios']; ?></label></button>
				</div>

        	 </form>
		
			<a href='../Controller/CENTRO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>

	