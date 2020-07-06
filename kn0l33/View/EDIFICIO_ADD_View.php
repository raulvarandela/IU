<?php
//Clase : EDIFICIO_ADD
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario para insertar datos
//-------------------------------------------------------
	class EDIFICIO_ADD{


		function __construct(){	//constructor de la clase
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><label id='Gestion Edificios'><?php echo $strings['Gestión Edificios']; ?></label></h1>
			<h3><label id='ADD'><?php echo $strings['ADD']; ?></label></h3>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return validarEdificoADD(this)">
			
				

			<label id='CODEDIFICIOl'><?php echo $strings['CODEDIFICIO']; ?></label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/,10)" ><br>
					
			<label id='NOMBREEDIFICIOl'><?php echo $strings['NOMBREEDIFICIO']; ?> </label>: <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this,50)"><br>
					
			<label id='DIRECCIONEDIFICIOl'><?php echo $strings['DIRECCIONEDIFICIO']; ?> </label>: <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '150' value = '' onblur="comprobarDireccion(this)" ><br>
					
			<label id='CAMPUSEDIFICIOl'><?php echo $strings['CAMPUSEDIFICIO']; ?> </label>: <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '10' value = '' onblur="comprobarTexto(this,10)" ><br>
					
					
					

					<input type="hidden" name="action" value="ADD">
  					<input type="image" id="boton" src="../View/Icons/mas.png" width="40" height="40">

			</form>
			<br></br>
		
			<a href='../Controller/EDIFICIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	