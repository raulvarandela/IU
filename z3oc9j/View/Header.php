<?php 
//Clase : Header.php
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: sirve de cabecera para la página
//-------------------------------------------------------
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH'; //pone por defecto el idioma español
	}
	else{
	}
	//se incluyen las validaciones
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
 	include '../View/js/validaciones.php';

?>
<html>

<head>
	<link rel="icon" type="image/png" href="../View/Icons/esei.png" />
	<title>

		<?php echo $strings['Ejemplo arquitectura IU'];?> 
	</title>
	<meta charset="UTF-8">
	<title>
		<?php echo $strings['Ejemplo arquitectura IU']; ?>
	</title>
	<!--<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/md5.js"></script>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> -->
	 
	<!--<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/vista.css" />-->
	<link rel="stylesheet" href="../View/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../View/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../View/css/bootstrap-grid.min.css" />
	<link rel="stylesheet" href="../View/css/bootstrap-reboot.css" />
	<link rel="stylesheet" href="../View/css/bootstrap-rebootmin.css" />
	<link rel="stylesheet" href="../View/css/bootstrap.css" />
	<link rel="stylesheet" href="../View/css/bootstrap.css" />
	<link rel="stylesheet" href="../View/css/vistas.css" />
	<script src="../View/js/bootstrap.bundle.min.js"></script>
    <script src="../View/js/bootstrap.js"></script>
    <script src="../View/js/bootstrap.bundle.min.js"></script>
    <script src="../View/js/bootstrap.bundle.js"></script>
	<!--<script src="../View/js/bootstrap.min.js"></script>-->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet"> 

	
	
       
</head>


<body>
		<div class="modal" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                       <!-- <h4 class="modal-title"><?php echo $strings['errorFormulario']; ?></h4>-->
                    </div>

                    <!-- Modal <button type="button" class="close" data-dismiss="modal">&times;</button>body -->
                    <div class="modal-body">
                        <div id="contenido-interno">
                            <div id="mensajeError"></div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a id="cerrar" href="#" onclick="cerrarModal();">
                            <button class="btn btn-danger">&times;</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>


		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>
</body>

<header>

	<div class="header">
	<img src='../View/Icons/Vigo.png' width="130" height="160">
	<div id="div_contenido">	


<div id="div_izq5">	
		<h4>
			<?php echo $strings['Portal de Gestión'];?>
		</h4>

	</p>

</div>

	
	<div id="div_izq3">	
		<?php echo $strings['idioma']; ?>:
	</div>
	
	<div id="div_izq2">				
	
	
		<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
       		<input type="hidden" name='idioma' value="ENGLISH">
        	<input type=image src="../View/Icons/inglaterra.png" width="25" height="25">
   		</form>
    </div>
    
    <div id="div_centro2">
    	<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
    	    <input type="hidden" name='idioma' value="SPANISH">
     	   <input type=image src="../View/Icons/españa.png" width="25" height="25">
  	  </form>
  	 </div> 
  	
  	<div id="div_der2">
    	<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
     	   <input type="hidden" name='idioma' value="GALLAECIAN">
      	  <input type=image src="../View/Icons/galicia.png" width="25" height="25">
   	 </form>
	</div>


<?php
	
	if (IsAuthenticated()){//saber si el usuario está autentificado
?>


<div id="div_centro">
	
		<img src='../View/Icons/usuario.png' width="15" height="15">
		<?php echo $strings['Usuario'] . ' : ' . $_SESSION['login'] . '<br>';//muestra que usuario está conectado ?>	

</div>	

	
<div id="div_der">
		<a href='../Functions/Desconectar.php'> 
			<img src='../View/Icons/salir.png' width="25" height="25">
		</a>
</div>

	
<?php } else { //muestra que el usuario no está identificado?>
<div id="div_der">	
	<?php echo $strings['Registrar']; ?> :
		<a href='../Controller/Register_Controller.php'><img src='../View/Icons/registrar.png' width="25" height="25"></a>
	<?php 	}	?>
</div>


</div>
</div>

</header>

<div id = 'main'>
<?php
	
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';//llama a menu lateral
	}
?>
<article>
