<?php
//Clase : PROF_TITULACION_ADD
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para add
//-------------------------------------------------------
	class PROF_TITULACION_ADD{


		function __construct($datosPROFESOR,$datosTITULACION){//constructor de la clase
			$this->datosPROFESOR = $datosPROFESOR;//datos del profesor
			$this->datosTITULACION = $datosTITULACION;	//datos de la titulación
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión  Titulaciones Profesor']; ?></h1>	
			<h3><?php echo $strings['ADD']; ?></h3>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return validarProfTitulacion(this)">
			
				 
					 <?php echo $strings['DNI']; ?> : 
					 <select name='DNI' id='DNI' >
						<?php foreach ($this->datosPROFESOR as $key1) { ?>
							<option value="<?php echo $key1['DNI'] ?>"><?php echo $key1['DNI']?></option>
						<?php } ?>
					</select><br>

					<?php echo $strings['CODTITULACION']; ?> : 
					<select name='CODTITULACION' id='CODTITULACION' >
						<?php foreach ($this->datosTITULACION as $key2) { ?>
							<option value="<?php echo $key2['CODTITULACION'] ?>"><?php echo $key2['CODTITULACION']?></option>
						<?php } ?>
					</select><br>
					<?php echo $strings['ANHOACADEMICO']; ?> : <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '20' value = '' onblur="comprobarAlfabetico(this,20)" ><br>
					
					


					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
			
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	