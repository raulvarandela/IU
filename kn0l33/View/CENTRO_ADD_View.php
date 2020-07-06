<?php
//Clase : CENTRO_ADD
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra un formulario para insertar datos
//-------------------------------------------------------
	class CENTRO_ADD{


		
		function __construct($datos){	//constructor de la clase
			$this->datos = $datos; //datos para mostar en el formulario
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
			
		?>
			<h1><label id='Gestion Centros'><?php echo $strings['Gestión Centros']; ?></label></h1>
			<h3><label id='ADD'><?php echo $strings['ADD']; ?></label></h3>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return validarCentrosADD(this)">
			
					

			<label id='CODCENTROl'><?php echo $strings['CODCENTRO']; ?> </label>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '10' value = '' onblur="comprobarExpresionRegular(this,/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/,10)"><br>
					 
			<label id='CODEDIFICIO'><?php echo $strings['CODEDIFICIO']; ?></label> :  

					<select name='CODEDIFICIO' id='CODEDIFICIO' >
						<?php foreach ($this->datos as $key) { ?>
							<option value="<?php echo $key['CODEDIFICIO'] ?>"><?php echo $key['CODEDIFICIO']?></option>
						<?php } ?>
						
					</select><br>
					
					<label id='NOMBRECENTROl'><?php echo $strings['NOMBRECENTRO']; ?></label>: <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '50' value = '' onblur="comprobarTexto(this,50)" ><br>

					<label id='DIRECCIONCENTROl'><?php echo $strings['DIRECCIONCENTRO']; ?></label> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '150' value = '' onblur="comprobarDireccion(this)" ><br>
					
					<label id='RESPONSABLECENTROl'> <?php echo $strings['RESPONSABLECENTRO']; ?></label> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' placeholder = '<?php echo $strings['Solo letras']; ?>' size = '60' value = '' onblur="comprobarTexto(this,60)" ><br>
					
					
					

					 <input type="hidden" name="action" value="ADD">
  					<input type="image" id="boton" src="../View/Icons/mas.png" width="40" height="40">

			</form>
				
			<br></br>
			<a href='../Controller/CENTRO_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin ADD

?>

	