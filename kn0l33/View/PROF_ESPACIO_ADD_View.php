<?php
//Clase : PROF_ESPACIO_ADD
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para insertar datos
//-------------------------------------------------------
	class PROF_ESPACIO_ADD{


		function __construct($datosPROFESOR,$datosESPACIO){	//constructor de la clase
			$this->datosPROFESOR = $datosPROFESOR;//datos del profesor
			$this->datosESPACIO = $datosESPACIO;//datos del espacio
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Espacio Profesor'><?php echo $strings['Gestión  Espacio Profesor']; ?></label></h1>
			<h3><label id='ADD'><?php echo $strings['ADD']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return validarProfEspacio(this);">
			
			<label id='DNI'><?php echo $strings['DNI']; ?></label>: 
						<select name='DNI' id='DNI' >
							<?php foreach ($this->datosPROFESOR as $key1) { ?>
								<option value="<?php echo $key1['DNI'] ?>"><?php echo $key1['DNI']?></option>
							<?php } ?>
						</select><br>

						<label id='CODESPACIO'>	<?php echo $strings['CODESPACIO']; ?> </label>: 
						<select name='CODESPACIO' id='CODESPACIO' >
							<?php foreach ($this->datosESPACIO as $key2) { ?>
								<option value="<?php echo $key2['CODESPACIO'] ?>"><?php echo $key2['CODESPACIO']?></option>
							<?php } ?>
						</select><br>
					
					


						<input type="hidden" name="action" value="ADD">
  					<input type="image" id="boton" src="../View/Icons/mas.png" width="40" height="40">

			</form>
				
		<br></br>
			
			<a href='../Controller/PROF_ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	