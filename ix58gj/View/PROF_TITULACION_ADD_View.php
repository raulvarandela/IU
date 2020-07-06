<?php
//Clase : PROF_TITULACION_ADD
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class PROF_TITULACION_ADD{


		function __construct($datosPROFESOR,$datosTITULACION){//constructor de la clase
			$this->datosPROFESOR = $datosPROFESOR;
			$this->datosTITULACION = $datosTITULACION;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
				 
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
					<?php echo $strings['ANHOACADEMICO']; ?> : <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					


					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	