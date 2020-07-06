<?php
//Archivo : GENERAL_test.php
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: archivo para ejecutar todos los tests
//-------------------------------------------------------


// crear el array principal de test
	$ERRORS_array_test = array();
	$ERRORS_array_test_global = array();
	$ERRORS_array_test_validaciones = array();
// incluimos aqui tantos ficheros de test como entidades
include '../test/Global_test.php';
include '../test/USUARIOS_test.php';
include '../test/CENTRO_test.php';
include '../test/EDIFICIO_test.php';
include '../test/ESPACIO_test.php';
include '../test/PROF_ESPACIO_test.php';
include '../test/PROF_TITULACION_test.php';
include '../test/PROFESOR_test.php';
include '../test/TITULACION_test.php';

include_once '../test/USUARIOS_VALIDACION_test.php';
include_once '../test/CENTRO_VALIDACION_test.php';
include_once '../test/EDIFICIO_VALIDACION_test.php';
include_once '../test/ESPACIO_VALIDACION_test.php';
include_once '../test/PROF_ESPACIO_VALIDACION_test.php';
include_once '../test/PROF_TITULACION_VALIDACION_test.php';
include_once '../test/PROFESOR_VALIDACION_test.php';
include_once '../test/TITULACION_VALIDACION_test.php';
?>


<?php
	global $contador_global; //contamos los errores en las pruebas globales
	$contador_global=0;
	foreach ($ERRORS_array_test_global as $test){
 		if($test['resultado']==='FALSE'){
			$contador_global++;
		}
	}

	global $contador_unitarias;//contamos los errores en las pruebas unitarias
	$contador_unitarias=0;
	foreach ($ERRORS_array_test as $test){
 		if($test['resultado']==='FALSE'){
			$contador_unitarias++;
		}
	}

	global $contador_validaciones;//contamos los errores en las validaciones
	$contador_validaciones=0;
	foreach ($ERRORS_array_test_validaciones as $test){
 		if($test['resultado']==='FALSE'){
			$contador_validaciones++;
		}
	}
	
?>
<!--mostamos la informacion sobre las pruebas-->
<h3>Numero de pruebas globales:  <?php echo count($ERRORS_array_test_global) ?> - Numero de errores: <?php echo $contador_global ?> <h3>

<h3>Numero de pruebas unitarias:  <?php echo count($ERRORS_array_test) ?> - Numero de errores: <?php echo $contador_unitarias ?> <h3>

<h3>Numero de pruebas en validaciones:  <?php echo count($ERRORS_array_test_validaciones) ?> - Numero de errores: <?php echo $contador_validaciones ?><h3>

<h1>Pruebas Totales: <?php echo count($ERRORS_array_test)+count($ERRORS_array_test_global)+count($ERRORS_array_test_validaciones); ?> - Errores totales <?php echo $contador_validaciones+$contador_global+$contador_unitarias ?> </h1>
<br>

<?php
// presentacion de las tablas
?>


<h1>Test GLOBAL</h1>
<table border=1>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Método
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test_global as $test)
	{

 if($test['resultado']==='FALSE'){
?>
	<tbody style="background: rgb(255, 0, 0);">
 <?php }else{ ?>
		<tbody style="background: rgb(0, 255, 0);">
<?php } ?>
	<tr>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
	</tbody>
<?php	
	
	}
?>
</table>


<h1>Test de unidad</h1>
<table border=1>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Método
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test as $test)
	{

 if($test['resultado']==='FALSE'){
?>
	<tbody style="background: rgb(255, 0, 0);">
 <?php }else{ ?>
		<tbody style="background: rgb(0, 255, 0);">
<?php } ?>
	<tr>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
	</tbody>
<?php	
	
	}
?>
</table>

<h1>Test de Validaciones</h1>
<table border=1>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Atributo
		</th>
		<th>
			Error testeado
		</th>
		<th>
			codigo esperado
		</th>
		<th>
			codigo obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test_validaciones as $test)
	{

 if($test['resultado']==='FALSE'){
?>
	<tbody style="background: rgb(255, 0, 0);">
 <?php }else{ ?>
		<tbody style="background: rgb(0, 255, 0);">
<?php } ?>
	<tr>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['codigo_esperado']; ?>
		</td>
		<td>
			<?php echo $test['codigo_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
	</tbody>
<?php	
	
	}
?>
</table>


