<?php
//Clase : PROFESOR_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para detalles
//-------------------------------------------------------
	class PROFESOR_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase 
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Profesor']; ?></h1>
			<h3><?php echo $strings['SHOWCURRENT']; ?></h3>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();">
				

                    <?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['NOMBREPROFESOR']; ?> : <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '30' value = '<?php echo $this->datos['NOMBREPROFESOR']; ?>' readonly='readonly' onblur="" ><br>
                    
                    <?php echo $strings['APELLIDOSPROFESOR']; ?> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '' size = '50' value = '<?php echo $this->datos['APELLIDOSPROFESOR']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['AREAPROFESOR']; ?> : <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' size = '40' value = '<?php echo $this->datos['AREAPROFESOR']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['DEPARTAMENTOPROFESOR']; ?> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' size = '40' value = '<?php echo $this->datos['DEPARTAMENTOPROFESOR']; ?>' readonly='readonly' onblur="" ><br>

                    
		
			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin PROFESOR_SHOWCURRENT

?>
	