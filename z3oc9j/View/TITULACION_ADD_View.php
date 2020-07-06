<?php
//Clase : TITULACION_ADD
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para add
//-------------------------------------------------------
	class TITULACION_ADD{


		function __construct($datos){//constructor de la clase
			$this->datos = $datos;	//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Gestión  Titulaciones']; ?></h1>
			<h3><?php echo $strings['ADD']; ?></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return validarTitulacionADD(this);">
			
					
					<?php echo $strings['CODTITULACION']; ?>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this,20)" ><br>
					
					<?php echo $strings['CODCENTRO']; ?> : 
					<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODCENTRO'] ?>"><?php echo $key['CODCENTRO']?></option>
						<?php } ?>
					</select><br>

					<?php echo $strings['NOMBRETITULACION']; ?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '100' value = '' onblur="comprobarTexto(this, 20)" ><br>
					
					<?php echo $strings['RESPONSABLETITULACION']; ?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '100' value = '' onblur="comprobarTexto(this, 20)" ><br>
					
					

					<input type='submit' name='action' value='ADD'>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	