<?php
//Script : Register_Controller
//Creado el : 10/10/2019
//Creado por: kn0l33
//Funcion: controla el registro de usuarios
//-------------------------------------------------------

session_start();
include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';


if (!isset($_POST['login'])) {//si no recibimos el login por post
    include '../View/Register_View.php'; //incluye la vista de register
    $register = new Register(); //crea un register
} else {//si recibimos el login por post
    include '../Model/USUARIOS_Model.php'; //incluyo el modelo de usuarios

    $foto = $_FILES['fotopersonal']; //foto es el archivo

    $usuario = new USUARIOS_Model($_POST['login'], $_POST['password'], $_POST['DNI'], $_POST['nombre'], //Se crea un usuarios con los datos recogidos por POST
            $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['FechaNacimiento'],$foto, $_POST['sexo']);

    $respuesta = $usuario->Register(); //crea un nuevo register

    if ($respuesta == 'true') {//si la respuesta es true
        $respuesta = $usuario->registrar();
        Include '../View/MESSAGE_View.php';
        new MESSAGE($respuesta, './Login_Controller.php');
    } else {//si la respuesta es false
        include '../View/MESSAGE_View.php';
        new MESSAGE($respuesta, './Login_Controller.php');
    }
}
?>