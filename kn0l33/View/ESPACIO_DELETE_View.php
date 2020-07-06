<?php
//Clase : ESPACIO_DELETE
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: muestra los datos de una tupla antes de ser eliminados
//-------------------------------------------------------
	class ESPACIO_DELETE{


		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //datos que se van a mostrar
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><label id='Gestion Espacio'><?php echo $strings['Gestión Espacio']; ?></label></h1>
			<h3><label id='DELETE'><?php echo $strings['DELETE']; ?></label></h3>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				
			<label id='CODESPACIO'><?php echo $strings['CODESPACIO']; ?></label>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '9' value = '<?php echo $this->datos['CODESPACIO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODCENTRO'><?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '9' value = '<?php echo $this->datos['CODCENTRO']; ?>' readonly='readonly' onblur="" ><br>

			<label id='CODEDIFICIO'> <?php echo $strings['CODEDIFICIO']; ?> </label>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '15' value = '<?php echo $this->datos['CODEDIFICIO']; ?>' readonly='readonly' onblur="" ><br>

                   <p><label id='TIPO'><?php echo $strings['TIPO']; ?></label>:
					    <input type='radio' name='TIPO' value='DESPACHO'<?php if($this->datos['TIPO']=='DESPACHO') echo 'checked';?> disabled> <label id='Despacho'><?php echo $strings['Despacho']; ?></label>
					    <input type='radio' name='TIPO' value='LABORATORIO'<?php if($this->datos['TIPO']=='LABORATORIO') echo 'checked';?> disabled> <label id='Laboratorio'><?php echo $strings['Laboratorio']; ?></label>
					    <input type='radio' name='TIPO' value='PAS'<?php if($this->datos['TIPO']=='PAS') echo 'checked';?> disabled>  <label id='PAS'><?php echo $strings['PAS']; ?></label>
					  </p>
                    
					  <label id='SUPERFICIEESPACIO'> <?php echo $strings['SUPERFICIEESPACIO']; ?> </label>: <input type = 'number' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '50' value = '<?php echo $this->datos['SUPERFICIEESPACIO']; ?>' readonly='readonly' onblur="" ><br>

					  <label id='NUMINVENTARIOESPACIO'> <?php echo $strings['NUMINVENTARIOESPACIO']; ?> </label>: <input type = 'number' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '40' value = '<?php echo $this->datos['NUMINVENTARIOESPACIO']; ?>' readonly='readonly' onblur="" ><br>


					<input type="hidden" name="action" value="DELETE">
  					<input type="image" id="boton" src="../View/Icons/eliminar.png" width="40" height="40">

			</form>
				
			<br> </br>
			<a href='../Controller/ESPACIO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin DELETE
?>