<?php
//Clase : PROF_TITULACION_SHOWALL
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class PROF_TITULACION_SHOWALL{


		function __construct($lista,$datos){//constructor de la clase
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><?php echo $strings['SHOWALL']; ?></h1>	
			<br>
			<br>
			<a href='../Controller/PROF_TITULACION_Controller.php?action=ADD'><?php echo $strings['ADD']; ?></a>
			<br>
			<a href='../Controller/PROF_TITULACION_Controller.php?action=SEARCH'><?php echo $strings['SEARCH']; ?></a>
			
		<table border=1>
			<tr>
<?php
		foreach ($this->lista as $titulo) {//bucle para el titulo
?>
				<th><?php echo $titulo; ?></th>
<?php
		}
?>
			</tr>
<?php
		foreach($this->datos as $fila)//bucle para las filas
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {//bucle para las columnas			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=EDIT&DNI=
							<?php echo $fila['DNI']; ?>&CODTITULACION=<?php echo $fila['CODTITULACION']; ?>
							'> <?php echo $strings['EDIT']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=DELETE&DNI=
							<?php echo $fila['DNI']; ?>&CODTITULACION=<?php echo $fila['CODTITULACION']; ?>
							'>  <?php echo $strings['DELETE']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/PROF_TITULACION_Controller.php?action=SHOWCURRENT&DNI=
							<?php echo $fila['DNI']; ?>&CODTITULACION=<?php echo $fila['CODTITULACION']; ?>
							'>  <?php echo $strings['SHOWCURRENT']; ?> </a>
				</td>
			</tr>

<?php

		}
?>


		</table>		
		<a href='../Controller/Index_Controller.php'><?php echo $strings['Volver']; ?> </a>
					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWALL

?>