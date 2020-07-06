<?php
//Clase : ESPACIO_ADD
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class ESPACIO_ADD{


		function __construct($datosCentro,$datosEdificio){	//constructor de la clase
			$this->datosEdificio = $datosEdificio;
			$this->datosCentro = $datosCentro;
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
			

				 	<?php echo $strings['CODESPACIO']; ?>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '9' value = '' onblur=""><br>

				 	<?php echo $strings['CODCENTRO']; ?>:
				 	<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datosCentro as $key1) { ?>
							<option value="<?php echo $key1['CODCENTRO'] ?>"><?php echo $key1['CODCENTRO']?></option>
						<?php } ?>
					</select><br>
					
					<?php echo $strings['CODEDIFICIO']; ?>:
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datosEdificio as $key2) { ?>
							<option value="<?php echo $key2['CODEDIFICIO'] ?>"><?php echo $key2['CODEDIFICIO']?></option>
						<?php } ?>
					</select><br>

					<p><?php echo $strings['TIPO']; ?>:
					    <input type='radio' name='TIPO' value='DESPACHO'> <?php echo $strings['Despacho']; ?>
					    <input type='radio' name='TIPO' value='LABORATORIO'> <?php echo $strings['Laboratorio']; ?>
					    <input type='radio' name='TIPO' value='PAS'> <?php echo $strings['PAS']; ?>
					  </p>

					<?php echo $strings['SUPERFICIEESPACIO']; ?>: <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '30' value = '' onblur="" ><br>
					
					<?php echo $strings['NUMINVENTARIOESPACIO']; ?>: <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					
					

					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	
	