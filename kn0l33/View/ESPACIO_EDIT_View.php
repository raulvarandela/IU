<?php
//Clase : ESPACIO_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
//-------------------------------------------------------
	class ESPACIO_EDIT{


		function __construct($valores,$datosEdificio,$datosCentro){	//contructor de la clase
			$this->valores = $valores; //valores de espacio
			$this->datosEdificio = $datosEdificio; //valores de edificio
			$this->datosCentro = $datosCentro; //valores de centro
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestión Espacio'><?php echo $strings['Gestión Espacio']; ?></label></h1>
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return validarEspacioEDIT(this)">
			
					
			<label id='CODESPACIO'><?php echo $strings['CODESPACIO']; ?> </label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' value = '<?php echo $this->valores['CODESPACIO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODCENTRO'><?php echo $strings['CODCENTRO']; ?> </label>:
				 	<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datosCentro as $key1) { ?>
							<option value="<?php echo $key1['CODCENTRO'] ?>"<?php if($this->valores['CODCENTRO']==$key1['CODCENTRO']){ echo 'selected';} ?>> <?php echo $key1['CODCENTRO']?> </option>
						<?php } ?>
					</select><br>


					<label id='CODEDIFICIO'>	<?php echo $strings['CODEDIFICIO']; ?> </label>:
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datosEdificio as $key2) { ?>
							<option value="<?php echo $key2['CODEDIFICIO'] ?>"<?php if($this->valores['CODEDIFICIO']==$key2['CODEDIFICIO']){ echo 'selected';} ?>> <?php echo $key2['CODEDIFICIO']?> </option>
						<?php } ?>
					</select><br>


				

					<p><label id='TIPO'><?php echo $strings['TIPO']; ?></label>:
					    <input type='radio' required id='TIPO' name='TIPO' value='DESPACHO'<?php if($this->valores['TIPO']=='DESPACHO') echo 'checked';?> > <label id='Despacho'><?php echo $strings['Despacho']; ?></label>
					    <input type='radio' required id='TIPO' name='TIPO' value='LABORATORIO'<?php if($this->valores['TIPO']=='LABORATORIO') echo 'checked';?>><label id='Laboratorio'> <?php echo $strings['Laboratorio']; ?></label>
					    <input type='radio' required id='TIPO' name='TIPO' value='PAS'<?php if($this->valores['TIPO']=='PAS') echo 'checked';?> > <label id='PAS'> <?php echo $strings['PAS']; ?></label>
					  </p>

					  <label id='SUPERFICIEESPACIOl'><?php echo $strings['SUPERFICIEESPACIO']; ?> </label>: <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '<?php echo $this->valores['SUPERFICIEESPACIO']; ?>' onblur="comprobarEntero(this,1,9999)" ><br>
					
					  <label id='NUMINVENTARIOESPACIOl'><?php echo $strings['NUMINVENTARIOESPACIO']; ?> </label>: <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '<?php echo $this->valores['NUMINVENTARIOESPACIO']; ?>' onblur="comprobarEntero(this,1,99999999)" ><br>

					


					<input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">

			</form>
				
			<br> </br>
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>
	