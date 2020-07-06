<?php
//controla el login
session_start();

if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../View/Login_View.php';
	$login = new Login(); //invoco  a la vista de login
}
else{

	include '../Model/Access_DB.php';

	include '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],'','','','','','','');//creo un usuario con el login y la password
	$respuesta = $usuario->login();//comprobamos si existe el usuario en la base de datos

	if ($respuesta == 'true'){ //caso de que si existe el usuario y empieza la sesión
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		header('Location:../index.php');
	}
	else{//caso de que no exista el usuario
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');//mensaje por pantalla
	}

}

?>

