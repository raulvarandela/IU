<?php
//Clase : USUARIOS_SHOWALL
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class USUARIOS_SHOWALL{

		//constructor de la clase
		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><?php echo $strings['SHOWALL']; ?></h1>	
			<br>
			<br><!-- botones para añadir y buscar -->
			<a href='../Controller/USUARIOS_Controller.php?action=ADD'><?php echo $strings['ADD']; ?></a>
			<br>
			<a href='../Controller/USUARIOS_Controller.php?action=SEARCH'><?php echo $strings['SEARCH']; ?></a>
			
		<table border=1>
			<tr>
<?php
		foreach ($this->lista as $titulo) {//bucle para mostar el título
?>
				<th><?php echo $titulo; ?></th>
<?php
		}
?>
			</tr>
<?php
		foreach($this->datos as $fila)//bucle para mostrar las filas
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {//bucle para mostar las columnas
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?><!-- botones correspondientes para cada fila-->
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=EDIT&login=
							<?php echo $fila['login']; ?>
							'> <?php echo $strings['EDIT']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=DELETE&login=
							<?php echo $fila['login']; ?>
							'> <?php echo $strings['DELETE']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=
							<?php echo $fila['login']; ?>
							'> <?php echo $strings['SHOWCURRENT']; ?> </a>
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

	