<?php
//Archivo : Access_BD.php
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función:  Función de conexión DB
// Se puede modificar para usar CONSTANTES definidos en config.inc
//-------------------------------------------------------

include_once '../Model/config.php';

function ConnectDB()
{
    $mysqli = new mysqli(host, user, pass , BD);
    	
	if ($mysqli->connect_errno) {
		include '../View/MESSAGE_View.php';
		new MESSAGE("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>
