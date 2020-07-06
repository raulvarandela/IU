<?php
//Clase : PROF_ESPACIO_DELETE
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para delete
//-------------------------------------------------------
	class PROF_ESPACIO_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //datos a mostar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión  Espacio Profesor']; ?></h1>
			<h3><?php echo $strings['DELETE']; ?></h3>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	<?php echo $strings['DNI']; ?> : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' value = '<?php echo $this->datos['DNI']; ?>' readonly='readonly' onblur="" ><br>

        

                    <?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '30' value = '<?php echo $this->datos['CODESPACIO']; ?>' readonly='readonly' onblur="" ><br>
                    
                    


					<input type='submit' name='action' value='DELETE'>

			</form>
				
		
		<a href='../Controller/PROF_ESPACIO_Controller.php'>
			<img src='../View/Icons/volver.png' width="20" height="20">
		</a>		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE

?>

	