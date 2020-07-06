<?php
//Script : Register_Controller
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Funcion: controla el registro de usuarios
//-------------------------------------------------------


session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';


if(!isset($_POST['login'])){
	include '../View/Register_View.php';
	$register = new Register();//invoco a la vista
}
else{
		
	include '../Model/USUARIOS_Model.php';
	if (!isset($_REQUEST['sexo'])){//en caso de que no se cubra el sexo, lo pongo vacio
        $_REQUEST['sexo'] = '';

    }
	$usuario = new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['DNI'],$_REQUEST['nombre'],
		$_REQUEST['apellidos'],$_REQUEST['telefono'],$_REQUEST['email'],$_REQUEST['FechaNacimiento'],$_REQUEST['sexo']);//creo un nuevo usuario con los datos introducidos
	$respuesta = $usuario->Register();//compruebo que no existe el usuario en la base de datos

	if ($respuesta == 'true'){//el usuario no existe y se muesta un mensaje de confirmación
		$respuesta = $usuario->registrar();//se resgistra
		Include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');//mensaje por pantalla
	}
	else{//el usuario existe y se muestra un mensaje de error
		include '../View/MESSAGE_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');//mensaje por pantalla
	}

}

?>

