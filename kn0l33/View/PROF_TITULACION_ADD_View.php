<?php
//Clase : PROF_TITULACION_ADD
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para insertar datos
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
			<h1><label id='Gestion  Titulaciones Profesor'><?php echo $strings['Gestión  Titulaciones Profesor']; ?></label></h1>	
			<h3><label id='ADD'><?php echo $strings['ADD']; ?></label></h3>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return validarProfTitulacion(this)">
			
				 
			<label id='DNI'> <?php echo $strings['DNI']; ?> </label>: 
					 <select name='DNI' id='DNI' >
						<?php foreach ($this->datosPROFESOR as $key1) { ?>
							<option value="<?php echo $key1['DNI'] ?>"><?php echo $key1['DNI']?></option>
						<?php } ?>
					</select><br>

					<label id='CODTITULACION'><?php echo $strings['CODTITULACION']; ?> </label>: 
					<select name='CODTITULACION' id='CODTITULACION' >
						<?php foreach ($this->datosTITULACION as $key2) { ?>
							<option value="<?php echo $key2['CODTITULACION'] ?>"><?php echo $key2['CODTITULACION']?></option>
						<?php } ?>
					</select><br>
					<label id='ANHOACADEMICOl'><?php echo $strings['ANHOACADEMICO']; ?> </label>: <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '' onblur="comprobarExpresionRegular(this,/[0-9]{4}[-][0-9]{4}/,9);" ><br>
					
					


					<input type="hidden" name="action" value="ADD">
  					<input type="image" id="boton" src="../View/Icons/mas.png" width="40" height="40">

			</form>
				
			<br></br>
			
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
			
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	