<?php
//Clase : ESPACIO_EDIT
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class ESPACIO_EDIT{


		function __construct($valores,$datosEdificio,$datosCentro){	//contructor de la clase
			$this->valores = $valores;
			$this->datosEdificio = $datosEdificio;
			$this->datosCentro = $datosCentro;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['EDIT']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					
				 	<?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '9' value = '<?php echo $this->valores['CODESPACIO']; ?>' readonly='readonly' onblur="" ><br>

				 	<?php echo $strings['CODCENTRO']; ?> :
				 	<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datosCentro as $key1) { ?>
							<option value="<?php echo $key1['CODCENTRO'] ?>"<?php if($this->valores['CODCENTRO']==$key1['CODCENTRO']){ echo 'selected';} ?>> <?php echo $key1['CODCENTRO']?> </option>
						<?php } ?>
					</select><br>


					<?php echo $strings['CODEDIFICIO']; ?> :
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datosEdificio as $key2) { ?>
							<option value="<?php echo $key2['CODEDIFICIO'] ?>"<?php if($this->valores['CODEDIFICIO']==$key2['CODEDIFICIO']){ echo 'selected';} ?>> <?php echo $key2['CODEDIFICIO']?> </option>
						<?php } ?>
					</select><br>


				

					<p><?php echo $strings['TIPO']; ?>:
					    <input type='radio' name='TIPO' value='DESPACHO'<?php if($this->valores['TIPO']=='DESPACHO') echo 'checked';?> > <?php echo $strings['Despacho']; ?>
					    <input type='radio' name='TIPO' value='LABORATORIO'<?php if($this->valores['TIPO']=='LABORATORIO') echo 'checked';?>> <?php echo $strings['Laboratorio']; ?>
					    <input type='radio' name='TIPO' value='PAS'<?php if($this->valores['TIPO']=='PAS') echo 'checked';?> >  <?php echo $strings['PAS']; ?>
					  </p>

					<?php echo $strings['SUPERFICIEESPACIO']; ?> : <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '30' value = '<?php echo $this->valores['SUPERFICIEESPACIO']; ?>' onblur="" ><br>
					
					<?php echo $strings['NUMINVENTARIOESPACIO']; ?> : <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '50' value = '<?php echo $this->valores['NUMINVENTARIOESPACIO']; ?>' onblur="" ><br>

					


					<input type='submit' name='action' value='EDIT'>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>
	