<?php
//Clase : PROFESOR_SHOWALL
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: por defecto muestra todas de cada entidad, pero solo unos atributos concretos
//-------------------------------------------------------
	class PROFESOR_SHOWALL{


		function __construct($lista,$datos){//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->lista = $lista;	//atributos a mostrar
			$this->render();//función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><label id='Gestion Profesor'><?php echo $strings['Gestión Profesor']; ?></label></h1>
			<h3><label id='SHOWALL'><?php echo $strings['SHOWALL']; ?></label></h3>		
			<br>
			<br>
			<a href='../Controller/PROFESOR_Controller.php?action=ADD'><img src='../View/Icons/mas.png' width="25" height="25"></a>
			
			<a href='../Controller/PROFESOR_Controller.php?action=SEARCH'><img src='../View/Icons/buscar.png' width="25" height="25"></a>
			
		<table id="customers">
			<tr>
<?php
		foreach ($this->lista as $titulo) {//bucle para recorrer el titulo
?>
				<th><label id=<?php echo $titulo ;?>><?php echo $strings[$titulo]; ?></label></th>
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
			foreach ($this->lista as $columna) {	//bucle para las columnas
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=EDIT&DNI=
							<?php echo $fila['DNI']; ?>
							'> <img src='../View/Icons/editar.png' width="25" height="25"></a>
				</td>
				<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=DELETE&DNI=
							<?php echo $fila['DNI']; ?>
							'> <img src='../View/Icons/eliminar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/PROFESOR_Controller.php?action=SHOWCURRENT&DNI=
							<?php echo $fila['DNI']; ?>
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