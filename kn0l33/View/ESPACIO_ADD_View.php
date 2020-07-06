<?php
//Clase : ESPACIO_ADD
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para insertar datos
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
			<h1><label id='Gestion Espacio'><?php echo $strings['Gestión Espacio']; ?></label></h1>
			<h3><label id='ADD'><?php echo $strings['ADD']; ?></label></h3>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return validarEspacioADD(this)">
			
			

			<label id='CODESPACIOl'> <?php echo $strings['CODESPACIO']; ?></label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/,10)"><br>

			<label id='CODCENTRO'><?php echo $strings['CODCENTRO']; ?></label>:
				 	<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datosCentro as $key1) { ?>
							<option value="<?php echo $key1['CODCENTRO'] ?>"><?php echo $key1['CODCENTRO']?></option>
						<?php } ?>
					</select><br>
					
					<label id='CODEDIFICIO'><?php echo $strings['CODEDIFICIO']; ?></label>:
					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datosEdificio as $key2) { ?>
							<option value="<?php echo $key2['CODEDIFICIO'] ?>"><?php echo $key2['CODEDIFICIO']?></option>
						<?php } ?>
					</select><br>

					<p><label id='TIPO'><?php echo $strings['TIPO']; ?></label>:
					    <input type='radio'  id='TIPO' name='TIPO' value='DESPACHO'><label id='Despacho'> <?php echo $strings['Despacho']; ?></label>
					    <input type='radio'  id='TIPO' name='TIPO' value='LABORATORIO'> <label id='Laboratorio'><?php echo $strings['Laboratorio']; ?></label>
					    <input type='radio'  id='TIPO' name='TIPO' value='PAS'> <label id='PAS'><?php echo $strings['PAS']; ?></label>
					  </p>

					  <label id='SUPERFICIEESPACIOl'><?php echo $strings['SUPERFICIEESPACIO']; ?></label>: <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '' onblur="comprobarEntero(this,1,9999)" ><br>
					
					  <label id='NUMINVENTARIOESPACIOl'>	<?php echo $strings['NUMINVENTARIOESPACIO']; ?></label>: <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '' onblur="comprobarEntero(this,1,99999999)" ><br>
					
					
					

					<input type="hidden" name="action" value="ADD">
  					<input type="image" id="boton" src="../View/Icons/mas.png" width="40" height="40">

			</form>
				
		<br> </br>
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	
	