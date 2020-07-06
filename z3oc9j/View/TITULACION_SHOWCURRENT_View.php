<?php
//Clase : TITULACION_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para detalles
//-------------------------------------------------------
	class TITULACION_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión  Titulaciones']; ?></h1>
			<h3><?php echo $strings['SHOWCURRENT']; ?></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
					
				 	
                    <?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'DCODCENTROI' id = 'CODCENTRO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '30' value = '<?php echo $this->datos['NOMBRETITULACION']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '<?php echo $this->datos['RESPONSABLETITULACION']; ?>' readonly='readonly' onblur="" ><br>

                    
		
			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>

	