<?php
//Clase : CENTRO_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
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
			<h1><label id='Gestion Centros'><?php echo $strings['Gestión Centros']; ?></label></h1>
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return validarCentrosEDIT(this)">
			
			

			<label id='CODCENTROl'><?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10' value = '<?php echo $this->valores['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODEDIFICIO'>	<?php echo $strings['CODEDIFICIO']; ?> </label>: 
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODEDIFICIO'] ?>"<?php if($this->valores['CODEDIFICIO']==$key['CODEDIFICIO']){ echo 'selected';} ?>> <?php echo $key['CODEDIFICIO']?> </option>
						<?php } ?>
					</select><br>

					<label id='NOMBRECENTROl'>	<?php echo $strings['NOMBRECENTRO']; ?></label> : <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '<?php echo $this->valores['NOMBRECENTRO']; ?>' onblur="comprobarTexto(this,50)" ><br>

					<label id='DIRECCIONCENTROl'>	<?php echo $strings['DIRECCIONCENTRO']; ?> </label>: <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '150' value = '<?php echo $this->valores['DIRECCIONCENTRO']; ?>' onblur="comprobarDireccion(this)" ><br>
					
					<label id='RESPONSABLECENTROl'>	<?php echo $strings['RESPONSABLECENTRO']; ?> </label>: <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '60' value = '<?php echo $this->valores['RESPONSABLECENTRO']; ?>' onblur="comprobarTexto(this,60)" ><br>

					

							
							
<input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">


			</form>
			<br></br>
		
			<a href='../Controller/CENTRO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
			<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	