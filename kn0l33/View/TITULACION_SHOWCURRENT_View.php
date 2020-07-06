<?php
//Clase : TITULACION_SHOWCURRENT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: formulario que muestra los detalles de una tupla determinada
//-------------------------------------------------------
	class TITULACION_SHOWCURRENT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Titulaciones'><?php echo $strings['Gestión  Titulaciones']; ?></label></h1>
			<h3><label id='SHOWCURRENT'><?php echo $strings['SHOWCURRENT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();">
					
				 	
			<label id='CODTITULACION'><?php echo $strings['CODTITULACION']; ?> </label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODCENTRO'><?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'DCODCENTROI' id = 'CODCENTRO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='NOMBRETITULACION'> <?php echo $strings['NOMBRETITULACION']; ?> </label>: <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '30' value = '<?php echo $this->datos['NOMBRETITULACION']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='RESPONSABLETITULACION'>  <?php echo $strings['RESPONSABLETITULACION']; ?> </label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '<?php echo $this->datos['RESPONSABLETITULACION']; ?>' readonly='readonly' onblur="" ><br>

                    
		
			</form>
			<form class="form-inline m-0" method='post'>

				<input type = 'hidden' name = 'CODTITULACION' id = 'CODTITULACION' size = '10' maxlength="10" value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly'><br>

				<div class="div_asociado">
					<button type="submit" class="p-2 m-2 btn btn-outline-primary" name="centros" value="SEARCH" formaction='../Controller/PROF_TITULACION_Controller.php'>	<label id='ver profesor titulaciones'><?php echo $strings['ver profesor titulaciones']; ?></label></button>
				</div>

        	 </form>	
		
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWCURRENT

?>

	