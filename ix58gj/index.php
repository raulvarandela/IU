<?php
//entrada a la aplicacion

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Authentication.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
	header('Location:./Controller/Login_Controller.php');
}
//si ha pasado por el login de forma correcta 
else{
	header('Location:./Controller/Index_Controller.php');
}

?>
