<?php
//Archivo : Global_test.php
//Creado el : 12/12/2019
//Creado por: kn0l33
//Función: testing funcionalidades globales
//-------------------------------------------------------


include '../Model/config.php';

function ExisteBD()
{

	global $ERRORS_array_test_global;

// creo array de almacen de test individual
	$global_array_test = array();

// usuario o contraseña no es correcto
//-------------------------------------------------------------------------------
	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Usuario contraseña erronea';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' (using password: YES)";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	if (!@$mysqli = new mysqli(host, user, 'aaaa' , BD))
	{

	}
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);


	//NO existe la BD
	//------------------------------------------

	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'No existe la bd';
	$global_array_test['error_esperado'] = "Access denied for user 'iu2018'@'localhost' to database ";
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	@$mysqli = new mysqli(host, user, pass , 'oo');
    	
	/* Comprueba la conexión */
	if ($mysqli->connect_errno) {
    	 $global_array_test['error_obtenido'] = $mysqli->connect_error;
    }


   	if ((strpos($global_array_test['error_esperado'],$global_array_test['error_obtenido'])) !== false)
	{
		$global_array_test['resultado'] = 'FALSE';
	}
	else
	{
		$global_array_test['resultado'] = 'OK';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

    

	if ((strpos($mysqli->connect_error,"Name or service not known")) !== false)
    {
    	//la direccion no existe
    }

    if ((strpos($mysqli->connect_error,"Connection refused")) !== false)
    {
    	//el gestor no esta levantado
    }

		// existe la BD
	//------------------------------------------

	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Existe la bd';
	$global_array_test['error_esperado'] = 0;
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	@$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	
    	 $global_array_test['error_obtenido'] = $mysqli->connect_errno;
    


   	if ($global_array_test['error_obtenido'] !== $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'FALSE';
	}
	else
	{
		$global_array_test['resultado'] = 'OK';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

    

	if ((strpos($mysqli->connect_error,"Name or service not known")) !== false)
    {
    	//la direccion no existe
    }

    if ((strpos($mysqli->connect_error,"Connection refused")) !== false)
    {
    	//el gestor no esta levantado
	}
	
	// existe la BD
	//------------------------------------------

	$global_array_test['entidad'] = 'GENERAL';	
	$global_array_test['metodo'] = 'BD';
	$global_array_test['error'] = 'Usuario contaseña correcta';
	$global_array_test['error_esperado'] = 0;
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	!@$mysqli = new mysqli(host, user, pass , BD);
    	
	/* Comprueba la conexión */
	
    $global_array_test['error_obtenido'] = $mysqli->connect_errno;
    


   	if ($global_array_test['error_obtenido'] === $global_array_test['error_esperado'])
	{
		$global_array_test['resultado'] = 'OK';
	}
	else
	{
		$global_array_test['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test_global, $global_array_test);



}



//función que valida si esxisten las tablas en la base de datos
function ExistenTablas()
{
	global $ERRORS_array_test_global;

	// creo array de almacen de test individual
	$global_array_test = array();
	$arrayaux = array();
	//conexión con la base de datos
	include_once '../Model/Access_DB.php';
	$mysqli = ConnectDB();

	//comprobar que la tabla de usuarios existe
	$global_array_test['entidad'] = 'USUARIOS';	
	$global_array_test['metodo'] = 'EXISTE';
	$global_array_test['error'] = 'Existe la entidad';
	$global_array_test['error_esperado'] = 'USUARIOS';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$sql = "SHOW TABLES";
	$arrayaux = $mysqli->query($sql);
	

	foreach($arrayaux as $tabla){
		if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
			$global_array_test['resultado'] = 'OK';
			$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
		}
	}

	if($global_array_test['resultado'] !== 'OK'){
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = '-1';
	}



	array_push($ERRORS_array_test_global, $global_array_test);

	//comprobar que la tabla de CENTRO existe
	$global_array_test['entidad'] = 'CENTRO';	
	$global_array_test['metodo'] = 'EXISTE';
	$global_array_test['error'] = 'Existe la entidad';
	$global_array_test['error_esperado'] = 'CENTRO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$sql = "SHOW TABLES";
	$arrayaux = $mysqli->query($sql);
	

	foreach($arrayaux as $tabla){
		if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
			$global_array_test['resultado'] = 'OK';
			$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
		}
	}

	if($global_array_test['resultado'] !== 'OK'){
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = '-1';
	}


	array_push($ERRORS_array_test_global, $global_array_test);

	//comprobar que la tabla de EDIFICIO existe
	$global_array_test['entidad'] = 'EDIFICIO';	
	$global_array_test['metodo'] = 'EXISTE';
	$global_array_test['error'] = 'Existe la entidad';
	$global_array_test['error_esperado'] = 'CENTRO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$sql = "SHOW TABLES";
	$arrayaux = $mysqli->query($sql);
	

	foreach($arrayaux as $tabla){
		if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
			$global_array_test['resultado'] = 'OK';
			$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
		}
	}

	if($global_array_test['resultado'] !== 'OK'){
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = '-1';
	}

	array_push($ERRORS_array_test_global, $global_array_test);

	//comprobar que la tabla de ESPACIO existe
	$global_array_test['entidad'] = 'ESPACIO';	
	$global_array_test['metodo'] = 'EXISTE';
	$global_array_test['error'] = 'Existe la entidad';
	$global_array_test['error_esperado'] = 'ESPACIO';
	$global_array_test['error_obtenido'] = '';
	$global_array_test['resultado'] = '';

	$sql = "SHOW TABLES";
	$arrayaux = $mysqli->query($sql);
	

	foreach($arrayaux as $tabla){
		if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
			$global_array_test['resultado'] = 'OK';
			$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
		}
	}

	if($global_array_test['resultado'] !== 'OK'){
		$global_array_test['resultado'] = 'FALSE';
		$global_array_test['error_obtenido'] = '-1';
	}


	array_push($ERRORS_array_test_global, $global_array_test);

		//comprobar que la tabla de PROF_ESPACIO existe
		$global_array_test['entidad'] = 'PROF_ESPACIO';	
		$global_array_test['metodo'] = 'EXISTE';
		$global_array_test['error'] = 'Existe la entidad';
		$global_array_test['error_esperado'] = 'PROF_ESPACIO';
		$global_array_test['error_obtenido'] = '';
		$global_array_test['resultado'] = '';
	
		$sql = "SHOW TABLES";
		$arrayaux = $mysqli->query($sql);
		
	
		foreach($arrayaux as $tabla){
			if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
				$global_array_test['resultado'] = 'OK';
				$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
			}
		}
	
		if($global_array_test['resultado'] !== 'OK'){
			$global_array_test['resultado'] = 'FALSE';
			$global_array_test['error_obtenido'] = '-1';
		}
	
	
		array_push($ERRORS_array_test_global, $global_array_test);

		//comprobar que la tabla de PROF_TITULACION existe
		$global_array_test['entidad'] = 'PROF_TITULACION';	
		$global_array_test['metodo'] = 'EXISTE';
		$global_array_test['error'] = 'Existe la entidad';
		$global_array_test['error_esperado'] = 'PROF_TITULACION';
		$global_array_test['error_obtenido'] = '';
		$global_array_test['resultado'] = '';
	
		$sql = "SHOW TABLES";
		$arrayaux = $mysqli->query($sql);
		
	
		foreach($arrayaux as $tabla){
			if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
				$global_array_test['resultado'] = 'OK';
				$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
			}
		}
	
		if($global_array_test['resultado'] !== 'OK'){
			$global_array_test['resultado'] = 'FALSE';
			$global_array_test['error_obtenido'] = '-1';
		}
	
		array_push($ERRORS_array_test_global, $global_array_test);

		//comprobar que la tabla de PROFESOR existe
		$global_array_test['entidad'] = 'PROFESOR';	
		$global_array_test['metodo'] = 'EXISTE';
		$global_array_test['error'] = 'Existe la entidad';
		$global_array_test['error_esperado'] = 'PROFESOR';
		$global_array_test['error_obtenido'] = '';
		$global_array_test['resultado'] = '';
	
		$sql = "SHOW TABLES";
		$arrayaux = $mysqli->query($sql);
		
	
		foreach($arrayaux as $tabla){
			if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
				$global_array_test['resultado'] = 'OK';
				$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
			}
		}
	
		if($global_array_test['resultado'] !== 'OK'){
			$global_array_test['resultado'] = 'FALSE';
			$global_array_test['error_obtenido'] = '-1';
		}
	
	
		array_push($ERRORS_array_test_global, $global_array_test);

		//comprobar que la tabla de TITULACION existe
		$global_array_test['entidad'] = 'TITULACION';	
		$global_array_test['metodo'] = 'EXISTE';
		$global_array_test['error'] = 'Existe la entidad';
		$global_array_test['error_esperado'] = 'TITULACION';
		$global_array_test['error_obtenido'] = '';
		$global_array_test['resultado'] = '';
	
		$sql = "SHOW TABLES";
		$arrayaux = $mysqli->query($sql);
		
	
		foreach($arrayaux as $tabla){
			if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
				$global_array_test['resultado'] = 'OK';
				$global_array_test['error_obtenido'] =$global_array_test['error_esperado'];
			}
		}
	
		if($global_array_test['resultado'] !== 'OK'){
			$global_array_test['resultado'] = 'FALSE';
			$global_array_test['error_obtenido'] = '-1';
		}
	
		array_push($ERRORS_array_test_global, $global_array_test);


		//comprobar que la tabla de tablanull existe
		$global_array_test['entidad'] = 'TABLANULL';	
		$global_array_test['metodo'] = 'EXISTE';
		$global_array_test['error'] = 'Existe la entidad';
		$global_array_test['error_esperado'] = '';
		$global_array_test['error_obtenido'] = '';
		$global_array_test['resultado'] = '';
	
		$sql = "SHOW TABLES";
		$arrayaux = $mysqli->query($sql);
		
	
		foreach($arrayaux as $tabla){
			if($tabla['Tables_in_IU2018']===$global_array_test['error_esperado']){
				$global_array_test['resultado'] = 'FALSE';
				$global_array_test['error_obtenido'] ='-1';
			}
		}
	
		if($global_array_test['resultado'] !== 'FALSE'){
			$global_array_test['resultado'] = 'OK';
			$global_array_test['error_obtenido'] = '';
		}
	
		array_push($ERRORS_array_test_global, $global_array_test);
}

ExisteBD();
ExistenTablas();
?>