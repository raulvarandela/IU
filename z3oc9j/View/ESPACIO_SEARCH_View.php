<?php
//Clase : ESPACIO_SEARCH
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de search
//-------------------------------------------------------
	class ESPACIO_SEARCH{


		function __construct(){	//constructor de la clase
			$this->render(); //función de render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Espacio']; ?></h1>
			<h3><?php echo $strings['SEARCH']; ?></h3>	
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return validarEspacioSEARCH(this);">
			
					

				 	<?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '' onblur="comprobarAlfabetico(this,20)"><br>

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '9' value = '' onblur="comprobarAlfabetico(this,20)"><br>
				 	
				 	<?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this,20)" ><br>

				 	<p><?php echo $strings['TIPO']; ?>:
					    <input type='radio' name='TIPO' value='DESPACHO'> <?php echo $strings['Despacho']; ?>
					    <input type='radio' name='TIPO' value='LABORATORIO'> <?php echo $strings['Laboratorio']; ?>
					    <input type='radio' name='TIPO' value='PAS'>  <?php echo $strings['PAS']; ?>
					  </p>
										
					<?php echo $strings['SUPERFICIEESPACIO']; ?> : <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '50' value = '' onblur="comprobarEntero(this,1,100)" ><br>
					
					<?php echo $strings['NUMINVENTARIOESPACIO']; ?> : <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '<?php echo $strings['Solo numeros']; ?>' size = '40' value = '' onblur="comprobarEntero(this,1,100)" ><br>

					

					<input type='submit' name='action' value='SEARCH'>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SEARCH

?>
