<?php
//Clase : TITULACION_ADD
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para insertar datos
//-------------------------------------------------------
	class TITULACION_ADD{


		function __construct($datos){//constructor de la clase
			$this->datos = $datos;	//datos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Titulaciones'><?php echo $strings['Gestión  Titulaciones']; ?></label></h1>
			<h3><label id='ADD'><?php echo $strings['ADD']; ?></label></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return validarTitulacionADD(this);">
			
					
			<label id='CODTITULACIONl'><?php echo $strings['CODTITULACION']; ?></label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarAlfabetico(this,10)" ><br>
					
			<label id='CODCENTRO'><?php echo $strings['CODCENTRO']; ?> </label>: 
					<select name='CODCENTRO' id='CODCENTRO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODCENTRO'] ?>"><?php echo $key['CODCENTRO']?></option>
						<?php } ?>
					</select><br>

					<label id='NOMBRETITULACIONl'><?php echo $strings['NOMBRETITULACION']; ?> </label>: <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this, 50)" ><br>
					
					<label id='RESPONSABLETITULACIONl'><?php echo $strings['RESPONSABLETITULACION']; ?> </label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '60' value = '' onblur="comprobarTexto(this, 60)" ><br>
					
					

					<input type="hidden" name="action" value="ADD">
  					<input type="image" id="boton" src="../View/Icons/mas.png" width="40" height="40">

			</form>
				
			<br></br>
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	