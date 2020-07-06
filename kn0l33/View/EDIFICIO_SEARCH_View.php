<?php
//Clase : EDIFICIO_SEARCH
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función:muestra un formulario para introducir datos por los cuales se va a buscar
//-------------------------------------------------------
	class EDIFICIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Edificios'><?php echo $strings['Gestión Edificios']; ?></label></h1>
			<h3><label id='SEARCH'><?php echo $strings['SEARCH']; ?></label></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return validarEdificoSEARCH(this);">
			
				 
				 	
			<label id='CODEDIFICIOl'><?php echo $strings['CODEDIFICIO']; ?> </label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)" ><br>

			<label id='NOMBREEDIFICIOl'><?php echo $strings['NOMBREEDIFICIO']; ?> </label>: <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarAlfabetico2(this,50)" ><br>
										
			<label id='DIRECCIONEDIFICIOl'><?php echo $strings['DIRECCIONEDIFICIO']; ?> </label>: <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '150' value = '' onblur="comprobarAlfabetico2(this)" ><br>
					
			<label id='CAMPUSEDIFICIOl'>	<?php echo $strings['CAMPUSEDIFICIO']; ?> </label>: <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '10' value = '' onblur="comprobarAlfabetico2(this,10)" ><br>

					

					<input type="hidden" name="action" value="SEARCH">
  					<input type="image" id="boton" src="../View/Icons/buscar.png" width="40" height="40">

			</form>
				
		<br></br>
			<a href='../Controller/EDIFICIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
