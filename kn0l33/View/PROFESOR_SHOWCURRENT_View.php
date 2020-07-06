<?php
//Clase : PROFESOR_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario que muestra los detalles de una tupla determinada
//-------------------------------------------------------
	class PROFESOR_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase 
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Profesor'><?php echo $strings['Gestión Profesor']; ?></label></h1>
			<h3><label id='SHOWCURRENT'><?php echo $strings['SHOWCURRENT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();">
				

			<label id='DNI'><?php echo $strings['DNI']; ?></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '15' value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly' onblur="" ><br>

			<label id='NOMBREPROFESOR'><?php echo $strings['NOMBREPROFESOR']; ?> </label>: <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '30' value = '<?php echo $this->datos['NOMBREPROFESOR']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='APELLIDOSPROFESOR'><?php echo $strings['APELLIDOSPROFESOR']; ?> </label>: <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR' placeholder = '' size = '50' value = '<?php echo $this->datos['APELLIDOSPROFESOR']; ?>' readonly='readonly' onblur="" ><br>

			<label id='AREAPROFESOR'> <?php echo $strings['AREAPROFESOR']; ?> </label>: <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR' size = '40' value = '<?php echo $this->datos['AREAPROFESOR']; ?>' readonly='readonly' onblur="" ><br>

			<label id='DEPARTAMENTOPROFESOR'> <?php echo $strings['DEPARTAMENTOPROFESOR']; ?> </label>: <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' size = '40' value = '<?php echo $this->datos['DEPARTAMENTOPROFESOR']; ?>' readonly='readonly' onblur="" ><br>

					
                    
		
			</form>
			
			<form class="form-inline m-0" method='post'>

				<input type = 'hidden' name = 'DNI' id = 'DNI' size = '10' maxlength="10" value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly'><br>

				<div class="div_asociado">
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/PROF_ESPACIO_Controller.php'><label id='ver espacios profesor'><?php echo $strings['ver espacios profesor']; ?></label></button>
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/PROF_TITULACION_Controller.php'><label id='ver profesor titulaciones'><?php echo $strings['ver profesor titulaciones']; ?></label></button>
				</div>

        	 </form>
		
			<a href='../Controller/PROFESOR_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin PROFESOR_SHOWCURRENT

?>
	