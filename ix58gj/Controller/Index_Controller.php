<?php
//controla el index
//session
session_start();
//incluir funcion autenticacion
include '../Functions/Authentication.php';
//si no esta autenticado
if (!IsAuthenticated()){
	header('Location: ../index.php');
}
//esta autenticado
else{
	include '../View/users_index_View.php';
	new Index();//invoco a la vista
}

?>