<?php
//Clase : EDIFICIO_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de detalles
//-------------------------------------------------------
	class EDIFICIO_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //muestra los datos
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Edificios']; ?></h1>
			<h3><?php echo $strings['SHOWCURRENT']; ?></h3>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	
                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'DNOMBREEDIFICIOI' id = 'NOMBREEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['NOMBREEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['DIRECCIONEDIFICIO']; ?> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '' size = '30' value = '<?php echo $this->datos['DIRECCIONEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['CAMPUSEDIFICIO']; ?> : <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '' size = '50' value = '<?php echo $this->datos['CAMPUSEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    
		
			</form>
				
		
			<a href='../Controller/EDIFICIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>

	