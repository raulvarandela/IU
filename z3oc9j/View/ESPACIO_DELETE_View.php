<?php
//Clase : ESPACIO_DELETE
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra el formulario de delete
//-------------------------------------------------------
	class ESPACIO_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //datos que se van a mostrar
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><?php echo $strings['Gestión Espacio']; ?></h1>
			<h3><?php echo $strings['DELETE']; ?></h3>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				
					<?php echo $strings['CODESPACIO']; ?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '9' value = '<?php echo $this->datos['CODESPACIO']; ?>' readonly='readonly' onblur="" ><br>

				 	<?php echo $strings['CODCENTRO']; ?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['CODEDIFICIO']; ?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                   <p><?php echo $strings['TIPO']; ?>:
					    <input type='radio' name='TIPO' value='DESPACHO'<?php if($this->datos['TIPO']=='DESPACHO') echo 'checked';?> disabled> <?php echo $strings['Despacho']; ?>
					    <input type='radio' name='TIPO' value='LABORATORIO'<?php if($this->datos['TIPO']=='LABORATORIO') echo 'checked';?> disabled> <?php echo $strings['Laboratorio']; ?>
					    <input type='radio' name='TIPO' value='PAS'<?php if($this->datos['TIPO']=='PAS') echo 'checked';?> disabled>  <?php echo $strings['PAS']; ?>
					  </p>
                    
                    <?php echo $strings['SUPERFICIEESPACIO']; ?> : <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '50' value = '<?php echo $this->datos['SUPERFICIEESPACIO']; ?>' readonly='readonly' onblur="" ><br>

                    <?php echo $strings['NUMINVENTARIOESPACIO']; ?> : <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '40' value = '<?php echo $this->datos['NUMINVENTARIOESPACIO']; ?>' readonly='readonly' onblur="" ><br>


					<input type='submit' name='action' value='DELETE'>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE
?>