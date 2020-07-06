<?php
//Clase : USUARIOS_SHOWALL
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: muestra todas las tuplas
//-------------------------------------------------------
	class USUARIOS_SHOWALL{

		//constructor de la clase
		function __construct($lista,$datos){
			$this->datos = $datos;//datos a mostrar
			$this->lista = $lista;	//atributos que se muestran
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><?php echo $strings['Gestión Usuarios']; ?></h1>	
			<h3><?php echo $strings['SHOWALL']; ?></h3>	
			<br>
			<br><!-- botones para añadir y buscar -->
			<a href='../Controller/USUARIOS_Controller.php?action=ADD'>
				<img src='../View/Icons/mas.png' width="25" height="25">
			</a>
			
			
			<a href='../Controller/USUARIOS_Controller.php?action=SEARCH'>
				<img src='../View/Icons/buscar.png' width="25" height="25">
			</a>
			
		<table id="customers">
			<tr>
<?php
		foreach ($this->lista as $titulo) {//bucle para mostar el título
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
							'><img src='../View/Icons/editar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=DELETE&login=
							<?php echo $fila['login']; ?>
							'> <img src='../View/Icons/eliminar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=
							<?php echo $fila['login']; ?>
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

	