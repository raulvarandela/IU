<?php
//Clase : TITULACION_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
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
			<h1><label id='Gestion  Titulaciones'><?php echo $strings['Gestión  Titulaciones']; ?></label></h1>
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return validarTitulacionEDIT(this)">
			
				 	
					
			<label id='CODTITULACIONl'><?php echo $strings['CODTITULACION']; ?></label> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' value = '<?php echo $this->valores['CODTITULACION']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODCENTRO'>	<?php echo $strings['CODCENTRO']; ?> </label>: 
					<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODCENTRO'] ?>"<?php if($this->valores['CODCENTRO']==$key['CODCENTRO']){ echo 'selected';} ?>> <?php echo $key['CODCENTRO']?> </option>
						<?php } ?>
					</select><br>


					<label id='NOMBRETITULACIONl'><?php echo $strings['NOMBRETITULACION']; ?> </label>: <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '<?php echo $this->valores['NOMBRETITULACION']; ?>' onblur="comprobarTexto(this, 50)" ><br>
					
					<label id='RESPONSABLETITULACIONl'>	<?php echo $strings['RESPONSABLETITULACION']; ?> </label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '20' value = '<?php echo $this->valores['RESPONSABLETITULACION']; ?>' onblur="comprobarAlfabetico(this, 60)" ><br>

					

					<input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">
			</form>
				
			<br></br>
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	