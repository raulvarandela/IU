<?php
//Clase : ESPACIO_SEARCH
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para introducir datos por los cuales se va a buscar
//-------------------------------------------------------
	class ESPACIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render(); //función de render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Espacio'><?php echo $strings['Gestión Espacio']; ?></label></h1>
			<h3><label id='SEARCH'><?php echo $strings['SEARCH']; ?></label></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return validarEspacioSEARCH(this);">
			
					

			<label id='CODESPACIOl'><?php echo $strings['CODESPACIO']; ?> </label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)"><br>

			<label id='CODCENTROl'><?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)"><br>
				 	
			<label id='CODEDIFICIOl'><?php echo $strings['CODEDIFICIO']; ?> </label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)" ><br>

				 	<p><label id='TIPO'><?php echo $strings['TIPO']; ?></label>:
					    <input type='radio' id='TIPO' name='TIPO' value='DESPACHO'> <label id='Despacho'><?php echo $strings['Despacho']; ?></label>
					    <input type='radio' id='TIPO' name='TIPO' value='LABORATORIO'> <label id='Laboratorio'><?php echo $strings['Laboratorio']; ?></label>
					    <input type='radio' id='TIPO' name='TIPO' value='PAS'> <label id='PAS'> <?php echo $strings['PAS']; ?></label>
					  </p>
										
					  <label id='SUPERFICIEESPACIOl'><?php echo $strings['SUPERFICIEESPACIO']; ?> </label>: <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '' onblur="comprobarEntero(this,1,9999)" ><br>
					  <label id='NUMINVENTARIOESPACIOl'><?php echo $strings['NUMINVENTARIOESPACIO']; ?> </label>: <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '' value = '' onblur="comprobarEntero(this,1,99999999)" ><br>

					

					<input type="hidden" name="action" value="SEARCH">
  					<input type="image" id="boton" src="../View/Icons/buscar.png" width="40" height="40">

			</form>
				
			<br> </br>
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
