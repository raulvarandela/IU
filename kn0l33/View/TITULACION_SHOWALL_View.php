<?php
//Clase : TITULACION_SHOWALL
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: por defecto muestra todas de cada entidad, pero solo unos atributos concretos
//-------------------------------------------------------
	class TITULACION_SHOWALL{


		function __construct($lista,$datos){//constructor de la clase
			$this->datos = $datos;//datos a mostrar
			$this->lista = $lista;	//lista de atributos que se muestran
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><label id='Gestion  Titulaciones'><?php echo $strings['Gestión  Titulaciones']; ?></label></h1>	
			<h3><label id='SHOWALL'><?php echo $strings['SHOWALL']; ?></label></h3>	
			<br>
			<br>
			<a href='../Controller/TITULACION_Controller.php?action=ADD'><img src='../View/Icons/mas.png' width="25" height="25"></a>
			
			<a href='../Controller/TITULACION_Controller.php?action=SEARCH'><img src='../View/Icons/buscar.png' width="25" height="25"></a>
			
		<table id="customers">
			<tr>
<?php
		foreach ($this->lista as $titulo) {//bucle el titulo
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
		foreach($this->datos as $fila)//bucle que recorre las filas
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {//bucle que recorre las columnas
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/TITULACION_Controller.php?action=EDIT&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'> <img src='../View/Icons/editar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/TITULACION_Controller.php?action=DELETE&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
							'> <img src='../View/Icons/eliminar.png' width="25" height="25"> </a>
				</td>
				<td>
					<a href='
						../Controller/TITULACION_Controller.php?action=SHOWCURRENT&CODTITULACION=
							<?php echo $fila['CODTITULACION']; ?>
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
