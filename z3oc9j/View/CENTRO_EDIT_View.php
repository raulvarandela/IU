<?php
//Clase : CENTRO_EDIT
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de edit
//-------------------------------------------------------
	class CENTRO_EDIT{


		function __construct($valores,$datos){	//constructor de la clase
			$this->valores= $valores; //datos que se muestan
			$this->datos = $datos; //claves foraneas
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión Centros']; ?></h1>
			<h3><?php echo $strings['EDIT']; ?></h3>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return validarCentrosEDIT(this)">
			
			

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '<?php echo $this->valores['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

					<?php echo $strings['CODEDIFICIO']; ?> : 
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODEDIFICIO'] ?>"<?php if($this->valores['CODEDIFICIO']==$key['CODEDIFICIO']){ echo 'selected';} ?>> <?php echo $key['CODEDIFICIO']?> </option>
						<?php } ?>
					</select><br>

					<?php echo $strings['NOMBRECENTRO']; ?> : <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '15' value = '<?php echo $this->valores['NOMBRECENTRO']; ?>' onblur="comprobarTexto(this,20)" ><br>

					<?php echo $strings['DIRECCIONCENTRO']; ?> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '100' value = '<?php echo $this->valores['DIRECCIONCENTRO']; ?>' onblur="comprobarTexto(this,20)" ><br>
					
					<?php echo $strings['RESPONSABLECENTRO']; ?> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '30' value = '<?php echo $this->valores['RESPONSABLECENTRO']; ?>' onblur="comprobarTexto(this,20)" ><br>

					

							


					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/CENTRO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
			<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	