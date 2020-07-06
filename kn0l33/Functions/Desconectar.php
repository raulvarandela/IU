<?php
//Archivo : Desconectar.php
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función:se deconecta de la sesion
//-------------------------------------------------------

session_start();
session_destroy();
header('Location:../index.php');

?>
