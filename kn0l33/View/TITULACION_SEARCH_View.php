<?php
//Clase : TITULACION_SEARCH
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para introducir datos por los cuales se va a buscar
//-------------------------------------------------------
	class TITULACION_SEARCH{


		function __construct(){	//constructro de la clase
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><label id='Gestion  Titulaciones'><?php echo $strings['Gestión  Titulaciones']; ?></label></h1>
			<h3><label id='SEARCH'><?php echo $strings['SEARCH']; ?></label></h3>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return validarTitulacionSEARCH(this);">
			
				 	
				 	
			<label id='CODTITULACIONl'><?php echo $strings['CODTITULACION']; ?> </label>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^([a-zA-Z][0-9])^/,10)" ><br>

			<label id='CODCENTROl'>	<?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/[a-z]|[A-Z]|[0-9]|[-]/,10)" ><br>
										
			<label id='NOMBRETITULACIONl'><?php echo $strings['NOMBRETITULACION']; ?> </label>: <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarAlfabetico2(this, 50)" ><br>
					
			<label id='RESPONSABLETITULACIONl'><?php echo $strings['RESPONSABLETITULACION']; ?> </label>: <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '60' value = '' onblur="comprobarAlfabetico2(this, 60)" ><br>

					

					<input type="hidden" name="action" value="SEARCH">
  					<input type="image" id="boton" src="../View/Icons/buscar.png" width="40" height="40">

			</form>
				
			<br></br>
			<a href='../Controller/TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
