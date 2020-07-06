<?php
//Clase : TITULACION_EDIT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para edit
//-------------------------------------------------------
	class TITULACION_EDIT{


		function __construct($valores,$datos){	//constructor de la clase
			$this->valores = $valores;//datos a mostrar
			$this->datos = $datos;//claves foraneas
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión  Titulaciones']; ?></h1>
			<h3><?php echo $strings['EDIT']; ?></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return validarTitulacionEDIT(this)">
			
				 	
					
					<?php echo $strings['CODTITULACION']; ?> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '<?php echo $this->valores['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['CODCENTRO']; ?> : 
					<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODCENTRO'] ?>"<?php if($this->valores['CODCENTRO']==$key['CODCENTRO']){ echo 'selected';} ?>> <?php echo $key['CODCENTRO']?> </option>
						<?php } ?>
					</select><br>


					<?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '100' value = '<?php echo $this->valores['NOMBRETITULACION']; ?>' onblur="comprobarTexto(this, 20)" ><br>
					
					<?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '20' value = '<?php echo $this->valores['RESPONSABLETITULACION']; ?>' onblur="comprobarTexto(this, 20)" ><br>

					

					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	