<?php
//Clase : Login
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
	class Login{


		function __construct(){	//constructor de la clase
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><?php echo $strings['Login']; ?></h1>	 
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();">
					
				 	<?php echo $strings['Login']; ?> : <input type = 'text' name = 'login' placeholder = '' size = '9' value = '' onblur="javi1();"  ><br>
				 	
					<?php echo $strings['Password']; ?> : <input type = 'password' name = 'password' placeholder = '' size = '15' value = '' onblur="esNoVacio('password')  && comprobarLetrasNumeros('password',15)"  ><br>

					<input type='submit' name='action' value='Login'>

			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
