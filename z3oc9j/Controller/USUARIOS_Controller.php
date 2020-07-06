
<?php
//Archivo : USUARIOS_Controller
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: controla la gestion de los usuarios
//-------------------------------------------------------

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/USUARIOS_Model.php';
	include '../View/USUARIOS_SHOWALL_View.php';
	include '../View/USUARIOS_SEARCH_View.php';
	include '../View/USUARIOS_ADD_View.php';
	include '../View/USUARIOS_EDIT_View.php';
	include '../View/USUARIOS_DELETE_View.php';
	include '../View/USUARIOS_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form(){

	
	if (!isset($_POST['login'])){
    $_POST['login'] = '';
    }
	if (!isset($_POST['password'])){
        $_POST['password'] = '';
    }
	if (!isset($_POST['nombre'])){
        $_POST['nombre'] = '';
    }
	if (!isset($_POST['apellidos'])){
        $_POST['apellidos'] = '';
    }
	if (!isset($_POST['email'])){
        $_POST['email'] = '';
    }
    if (!isset($_POST['telefono'])){
        $_POST['telefono'] = '';
    }
    if (!isset($_POST['DNI'])){
        $_POST['DNI'] = '';
    }
    if (!isset($_POST['FechaNacimiento'])){
        $_POST['FechaNacimiento'] = '';

    }
    if (!isset($_POST['sexo'])){
        $_POST['sexo'] = '';

    }
    
		$user = new USUARIOS_Model($_POST['login'],$_POST['password'],$_POST['DNI'],$_POST['nombre'],$_POST['apellidos'],$_POST['telefono'],$_POST['email'],$_POST['FechaNacimiento'],$_POST['sexo']);
		return $user;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new USUARIOS_ADD();//invocaión de la vista
				}
				else{
					$USUARIOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $USUARIOS->ADD();// se sañade
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','');//se crea un usario
					$valores = $USUARIOS->RellenaDatos();//se recogen los valores
					new USUARIOS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$USUARIOS = get_data_form();//se recogen los datos del formulario
					$respuesta = $USUARIOS->DELETE();//se elimina
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','',''); // Creo el objeto
					$valores = $USUARIOS->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new USUARIOS_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/USUARIOS_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$USUARIOS = get_data_form(); //recojo los valores del formulario

					$respuesta = $USUARIOS->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new USUARIOS_SEARCH();//se invoca a la vista
				}
				else{
					$USUARIOS = get_data_form();//se recogen los datos del formulario
					$datos = $USUARIOS->SEARCH();//se busca

					
					$lista = array('login','password','nombre','apellidos','email'); //para que me muestre la info reducida

					new USUARIOS_SHOWALL($lista, $datos, '../index.php');//invoco a la vista
				}
				break;
			case 'SHOWCURRENT':
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','');//se crea un usario
				$valores = $USUARIOS->RellenaDatos();//recogo los datos de una tupla concreta
				new USUARIOS_SHOWCURRENT($valores);//y los muestro en la vista
				break;
			default://caso por defecto,se muestran todas las tuplas
				if (!$_POST){
					$USUARIOS = new USUARIOS_Model('','','','','','','','','');//se crea un usuario
				}
				else{
					$USUARIOS = get_data_form();//se recogen los datos del formulario
				}
				$datos = $USUARIOS->SEARCH();//busco todas las tuplas
				$lista = array('login','password','nombre','apellidos','email');//los atributos a mostrar en el showall
				new USUARIOS_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
