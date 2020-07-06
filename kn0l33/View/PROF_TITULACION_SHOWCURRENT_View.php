<?php
//Clase : PROF_TITULACION_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario que muestra los detalles de una tupla determinada
//-------------------------------------------------------
	class PROF_TITULACION_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Titulaciones Profesor'><?php echo $strings['Gestión  Titulaciones Profesor']; ?></label></h1>	
			<h3><label id='SHOWCURRENT'><?php echo $strings['SHOWCURRENT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
				
					
			<label id='DNI'> <?php echo $strings['DNI']; ?> </label>: <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODTITULACION'>  <?php echo $strings['CODTITULACION']; ?> </label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '30' value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='ANHOACADEMICO'> <?php echo $strings['ANHOACADEMICO']; ?> </label>: <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '<?php echo $this->datos['ANHOACADEMICO']; ?>' readonly='readonly' onblur="" ><br>

                    

                    
		
			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>
	