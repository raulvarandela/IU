<?php
//Clase : CENTRO_EDIT
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class CENTRO_EDIT{


		function __construct($valores,$datos){	//constructor de la clase
			$this->valores= $valores;
			$this->datos = $datos;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
			

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '<?php echo $this->valores['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['CODEDIFICIO']; ?> : 
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODEDIFICIO'] ?>"<?php if($this->valores['CODEDIFICIO']==$key['CODEDIFICIO']){ echo 'selected';} ?>> <?php echo $key['CODEDIFICIO']?> </option>
						<?php } ?>
					</select><br>

					<?php echo $strings['NOMBRECENTRO']; ?> : <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '' size = '15' value = '<?php echo $this->valores['NOMBRECENTRO']; ?>' onblur="" ><br>

					<?php echo $strings['DIRECCIONCENTRO']; ?> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '' size = '30' value = '<?php echo $this->valores['DIRECCIONCENTRO']; ?>' onblur="" ><br>
					
					<?php echo $strings['RESPONSABLECENTRO']; ?> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '' size = '50' value = '<?php echo $this->valores['RESPONSABLECENTRO']; ?>' onblur="" ><br>

					

							


					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/CENTRO_Controller.php'><?php echo $strings['Volver']; ?> </a>
			<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	