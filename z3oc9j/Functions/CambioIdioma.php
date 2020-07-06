<?php 
//Archivo : CambioIdioma.php
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: cambia el idioma según el idioma seleccionado
//-------------------------------------------------------
session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>