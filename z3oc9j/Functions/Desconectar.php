<?php
//Archivo : Desconectar.php
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función:se deconecta de la sesion
//-------------------------------------------------------

session_start();
session_destroy();
header('Location:../index.php');

?>
