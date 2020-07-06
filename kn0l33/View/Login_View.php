<?php
//Clase : Login
//Creado el : 10/10/2019
//Creado por: kn0l33
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
			<h1><label id='Login'><?php echo $strings['Login']; ?></label></h1>	 
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return validarLogin(this);">
					
			<label id='Loginl'><?php echo $strings['Login']; ?> </label>: <input type = 'text' name = 'login' id= 'login' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarExpresionRegular(this,/^([A-Za-z]{3,})$/,15)"  ><br>
				 	
			<label id='Passwordl'><?php echo $strings['Password']; ?> </label>: <input type = 'password'  id= 'password' name = 'password' placeholder = '<?php echo $strings['Numeros y letras']; ?>' size = '15' value = '' onblur="comprobarExpresionRegular(this,/^([A-Za-z]{3,})$/,15)"  ><br>

					<input type="hidden" name="action" value="Login">
  					<input type="image" id="boton" src="../View/Icons/login.png" width="50" height="50">
			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
