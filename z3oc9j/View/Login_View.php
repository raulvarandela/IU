<?php
//Clase : Login
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: formulario para iniciar sesión
//-------------------------------------------------------
	class Login{


		function __construct(){	//constructor de la clase
			$this->render(); //función render
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<script type="text/javascript" src="../View/js/validaciones.js"></script>
			<h1><?php echo $strings['Login']; ?></h1>	 
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return validarLogin(this);">
					
				 	<?php echo $strings['Login']; ?> : <input type = 'text' name = 'login' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarAlfabetico(this, 20);"  ><br>
				 	
					<?php echo $strings['Password']; ?> : <input type = 'password' name = 'password' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '25' value = '' onblur="comprobarAlfabetico(this, 128);"  ><br>

					<input type='submit' name='action' value='Login'>

			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
