<?php
//Clase : TITULACION_EDIT
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class TITULACION_EDIT{


		function __construct($valores,$datos){	//constructor de la clase
			$this->valores = $valores;
			$this->datos = $datos;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 	
					
					<?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->valores['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['CODCENTRO']; ?> : 
					<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODCENTRO'] ?>"<?php if($this->valores['CODCENTRO']==$key['CODCENTRO']){ echo 'selected';} ?>> <?php echo $key['CODCENTRO']?> </option>
						<?php } ?>
					</select><br>


					<?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '30' value = '<?php echo $this->valores['NOMBRETITULACION']; ?>' onblur="" ><br>
					
					<?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '<?php echo $this->valores['RESPONSABLETITULACION']; ?>' onblur="" ><br>

					

					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	