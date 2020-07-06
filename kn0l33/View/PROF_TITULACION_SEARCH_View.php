<?php
//Clase : PROF_TITULACION_SEARCH
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para introducir datos por los cuales se va a buscar
//-------------------------------------------------------
	class PROF_TITULACION_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion  Titulaciones Profesor'><?php echo $strings['Gestión  Titulaciones Profesor']; ?></label></h1>	
			<h3><label id='SEARCH'><?php echo $strings['SEARCH']; ?></label></h3>	

			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return validarProfTitulacionSEARCH(this);">
			
				 	

				 	<label id='DNIl'><?php echo $strings['DNI']; ?></label> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '<?php echo $strings['Introduce tu DNI']; ?>' size = '9' value = '' onblur="comprobarAlfabetico2(this,9)" ><br>
					
					 <label id='CODTITULACIONl'><?php echo $strings['CODTITULACION']; ?></label> : <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarAlfabetico2(this,10)" ><br>
					
					 <label id='ANHOACADEMICOl'><?php echo $strings['ANHOACADEMICO']; ?></label>: <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '' onblur="comprobarExpresionRegular(this,/[0-9]{4}[-][0-9]{4}|[0-9]/,9);" ><br>
					
					
					
					
					<input type="hidden" name="action" value="SEARCH">
  					<input type="image" id="boton" src="../View/Icons/buscar.png" width="40" height="40">

			</form>
				
		<br></br>
			<a href='../Controller/PROF_TITULACION_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
	