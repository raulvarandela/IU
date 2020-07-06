<?php
//Clase : EDIFICIO_EDIT
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra un formulario con los campos de una tupla y la posobilidad de editarlos
//-------------------------------------------------------
	class EDIFICIO_EDIT{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //datos que se muestran
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><label id='Gestion Edificios'><?php echo $strings['Gestión Edificios']; ?></label></h1>
			<h3><label id='EDIT'><?php echo $strings['EDIT']; ?></label></h3>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return validarEdificoEDIT(this)">
			
				

			<label id='CODEDIFICIOl'><?php echo $strings['CODEDIFICIO']; ?> </label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='NOMBREEDIFICIOl'><?php echo $strings['NOMBREEDIFICIO']; ?> </label>: <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '<?php echo $this->datos['NOMBREEDIFICIO']; ?>' onblur="comprobarTexto(this,50)" ><br>

			<label id='DIRECCIONEDIFICIOl'><?php echo $strings['DIRECCIONEDIFICIO']; ?> </label>: <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '150' value = '<?php echo $this->datos['DIRECCIONEDIFICIO']; ?>' onblur="comprobarDireccion(this)" ><br>
					
			<label id='CAMPUSEDIFICIOl'>	<?php echo $strings['CAMPUSEDIFICIO']; ?> </label>: <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '10' value = '<?php echo $this->datos['CAMPUSEDIFICIO']; ?>' onblur="comprobarTexto(this,10)" ><br>

					

					<input type="hidden" name="action" value="EDIT">
  					<input type="image" id="boton" src="../View/Icons/editar.png" width="40" height="40">

			</form>
			<br></br>
		
			<a href='../Controller/EDIFICIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin EDIT

?>

	