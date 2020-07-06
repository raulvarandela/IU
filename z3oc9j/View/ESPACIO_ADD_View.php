<?php
//Clase : ESPACIO_ADD
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de add
//-------------------------------------------------------
	class ESPACIO_ADD{


		function __construct($datosCentro,$datosEdificio){	//constructor de la clase
			$this->datosEdificio = $datosEdificio; //los datos de edificio
			$this->datosCentro = $datosCentro; //datos de centro
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión Espacio']; ?></h1>
			<h3><?php echo $strings['ADD']; ?></h3>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return validarEspacioADD(this)">
			
			

				 	<?php echo $strings['CODESPACIO']; ?>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '' onblur="comprobarAlfabetico(this,20)"><br>

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
					    <input type='radio' required name='TIPO' value='DESPACHO'> <?php echo $strings['Despacho']; ?>
					    <input type='radio' required name='TIPO' value='LABORATORIO'> <?php echo $strings['Laboratorio']; ?>
					    <input type='radio' required name='TIPO' value='PAS'> <?php echo $strings['PAS']; ?>
					  </p>

					<?php echo $strings['SUPERFICIEESPACIO']; ?>: <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '' onblur="comprobarEntero(this,1,100)" ><br>
					
					<?php echo $strings['NUMINVENTARIOESPACIO']; ?>: <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '' onblur="comprobarEntero(this,1,100)" ><br>
					
					
					

					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	
	