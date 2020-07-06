<?php
//Archivo : Authentication.php
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: Esta función valida si existe la variable de session login
//Si no existe redirige a la pagina de login
//Si existe comprueba si el usuario tiene permisos para ejecutar la accion de ese controlador
//-------------------------------------------------------


function IsAuthenticated(){
	if (!isset($_SESSION['login'])){
		return false;
	}
	else{
		
		return true;
	}
} //end of function IsAuthenticated()
?>

