<?php
//Clase : TITULACION_ADD
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class TITULACION_ADD{


		function __construct($datos){//constructor de la clase
			$this->datos = $datos;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['ADD']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_registro();"">
			
					
					<?php echo $strings['CODTITULACION']; ?>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '15' value = '' onblur="" ><br>
					
					<?php echo $strings['CODCENTRO']; ?> : 
					<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODCENTRO'] ?>"><?php echo $key['CODCENTRO']?></option>
						<?php } ?>
					</select><br>

					<?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '' size = '30' value = '' onblur="" ><br>
					
					<?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '' size = '50' value = '' onblur="" ><br>
					
					
					

					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	