<?php
//Clase : CENTRO_SHOWALL
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra todas las tuplas
//-------------------------------------------------------
	class CENTRO_SHOWALL{


		function __construct($lista,$datos){//constructor de la clase
			$this->datos = $datos;//datos a mostar
			$this->lista = $lista;	//atributos a mostrar
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><?php echo $strings['Gestión Centros']; ?></h1>	
			<h3><?php echo $strings['SHOWALL']; ?></h3>	
			<br>
			<br>
			<a href='../Controller/CENTRO_Controller.php?action=ADD'><img src='../View/Icons/mas.png' width="25" height="25"></a>
			
			<a href='../Controller/CENTRO_Controller.php?action=SEARCH'><img src='../View/Icons/buscar.png' width="25" height="25"></a>
			
		<table id="customers">
			<tr>

<?php
		foreach ($this->lista as $titulo) {//bucle para el titulo
?>
				<th><?php echo $titulo; ?></th>

<?php
		}
?>
<th> </th>
<th> </th>
<th> </th>
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
						../Controller/CENTRO_Controller.php?action=EDIT&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'> <img src='../View/Icons/editar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=DELETE&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'> <img src='../View/Icons/eliminar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/CENTRO_Controller.php?action=SHOWCURRENT&CODCENTRO=
							<?php echo $fila['CODCENTRO']; ?>
							'> <img src='../View/Icons/detalles.png' width="25" height="25"> </a>
				</td>
			</tr>

<?php

		}
?>


		</table>
	</br>
		<a href='../Controller/Index_Controller.php'>
				<img src='../View/Icons/volver.png' width="20" height="20">
			</a>		
		
					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin SHOWALL

?>
