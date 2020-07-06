<?php 
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH'; //pone por defecto el idioma español
	}
	else{
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<title>
		<?php echo $strings['Ejemplo arquitectura IU'];?> 
	</title>
	<meta charset="UTF-8">
	<title>
		<?php echo $strings['Ejemplo arquitectura IU']; ?>
	</title>
	<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/md5.js"></script>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	 
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />
</head>
<body>
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>
<header>
	<p style="text-align:center">
		<h1>
<?php
			echo $strings['Portal de Gestión'];
?>
		</h1>
	</p>
	
	<div width: 50%; align="left">
		<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
			<?php echo $strings['idioma']; ?>
			<select name="idioma" onChange='this.form.submit()'>
		        <!--seleccion de idioma-->
				<option value="ENGLISH" <?php if($_SESSION['idioma']=='ENGLISH') {echo 'selected';} ?> ><?php echo $strings['INGLES']; ?></option>
		        <option value="SPANISH" <?php if($_SESSION['idioma']=='SPANISH') {echo 'selected';} ?> ><?php echo $strings['ESPAÑOL']; ?></option>
		        <option value="GALLAECIAN" <?php if($_SESSION['idioma']=='GALLAECIAN') {echo 'selected';} ?> ><?php echo $strings['GALLEGO']; ?></option>
			</select>
		</form>
	</div>
<?php
	
	if (IsAuthenticated()){//saber si el usuario está autentificado
?>

<?php
		echo $strings['Usuario'] . ' : ' . $_SESSION['login'] . '<br>';//muestra que usuario está conectado
?>			
	<div width: 50%; align="right">
		<a href='../Functions/Desconectar.php'>
			<img src='./sign-error.png'>
		</a>
	</div>

<?php
	
	}
	else{
		echo $strings['Usuario no autenticado']; //muestra que el usuario no está identificado
		
?>
		<a href='../Controller/Register_Controller.php'><?php echo $strings['Registrar']; ?></a>
<?php
	}	
?>


</header>

<div id = 'main'>
<?php
	
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';//llama a menu lateral
	}
?>
<article>
