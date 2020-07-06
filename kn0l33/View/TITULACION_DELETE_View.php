<?php
//Clase : TITULACION_DELETE
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra los datos de una tupla antes de ser eliminados
//-------------------------------------------------------
	class TITULACION_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->render();//función remder
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Titulaciones'><?php echo $strings['Gestión  Titulaciones']; ?></label></h1>
			<h3><label id='DELETE'><?php echo $strings['DELETE']; ?></label></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	

			<label id='CODTITULACION'> <?php echo $strings['CODTITULACION']; ?>  </label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->datos['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODCENTRO'> <?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '30' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>
                    
			<label id='NOMBRETITULACION'><?php echo $strings['NOMBRETITULACION']; ?></label> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '50' value = '<?php echo $this->datos['NOMBRETITULACION']; ?>' readonly='readonly' onblur="" ><br>

			<label id='RESPONSABLETITULACION'> <?php echo $strings['RESPONSABLETITULACION']; ?> </label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '40' value = '<?php echo $this->datos['RESPONSABLETITULACION']; ?>' readonly='readonly' onblur="" ><br>


					<input type="hidden" name="action" value="DELETE">
  					<input type="image" id="boton" src="../View/Icons/eliminar.png" width="40" height="40">


			</form>
			<br></br>
		
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>
