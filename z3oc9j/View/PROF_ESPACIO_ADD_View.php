<?php
//Clase : PROF_ESPACIO_ADD
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para add
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
			<h1><?php echo $strings['Gestión  Espacio Profesor']; ?></h1>
			<h3><?php echo $strings['ADD']; ?></h3>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					<?php echo $strings['DNI']; ?>: 
						<select name='DNI' id='DNI' >
							<?php foreach ($this->datosPROFESOR as $key1) { ?>
								<option value="<?php echo $key1['DNI'] ?>"><?php echo $key1['DNI']?></option>
							<?php } ?>
						</select><br>

					<?php echo $strings['CODESPACIO']; ?> : 
						<select name='CODESPACIO' id='CODESPACIO' >
							<?php foreach ($this->datosESPACIO as $key2) { ?>
								<option value="<?php echo $key2['CODESPACIO'] ?>"><?php echo $key2['CODESPACIO']?></option>
							<?php } ?>
						</select><br>
					
					


					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			
			<a href='../Controller/PROF_ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	