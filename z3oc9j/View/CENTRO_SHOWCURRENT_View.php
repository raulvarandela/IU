<?php
//Clase : CENTRO_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de detalles
//-------------------------------------------------------
	class CENTRO_SHOWCURRENT{


		function __construct($datos){	//contructor de la clase
			$this->datos = $datos; //datos que se muestran
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Centros']; ?></h1>
			<h3><?php echo $strings['SHOWCURRENT']; ?></h3>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
					

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['NOMBRECENTRO']; ?> : <input type = 'text' name = 'DNOMBRECENTROI' id = 'NOMBRECENTRO' placeholder = '' size = '15' value = '<?php echo $this->datos['NOMBRECENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['DIRECCIONCENTRO']; ?> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '30' value = '<?php echo $this->datos['DIRECCIONCENTRO']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['RESPONSABLECENTRO']; ?> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '50' value = '<?php echo $this->datos['RESPONSABLECENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    
		
			</form>
				
		
			<a href='../Controller/CENTRO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>

	