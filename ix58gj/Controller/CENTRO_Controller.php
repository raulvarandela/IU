<?php
//controla la gestion de los centros
	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/CENTRO_Model.php';
	include '../Model/EDIFICIO_Model.php';
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){

	if (!isset($_POST['CODCENTRO'])){
    $_POST['CODCENTRO'] = '';
    }
	if (!isset($_POST['CODEDIFICIO'])){
        $_POST['CODEDIFICIO'] = '';
    }
	if (!isset($_POST['NOMBRECENTRO'])){
        $_POST['NOMBRECENTRO'] = '';
    }
	if (!isset($_POST['DIRECCIONCENTRO'])){
        $_POST['DIRECCIONCENTRO'] = '';
    }
    if (!isset($_POST['RESPONSABLECENTRO'])){
        $_POST['RESPONSABLECENTRO'] = '';
    }

		$centro = new CENTRO_Model($_POST['CODCENTRO'],$_POST['CODEDIFICIO'],$_POST['NOMBRECENTRO'],$_POST['DIRECCIONCENTRO'],$_POST['RESPONSABLECENTRO']);

		return $centro;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de CENTRO
					$EDIFICIO = NEW EDIFICIO_Model('','','','');//se crean un nuevo edifico
					$datos = $EDIFICIO->SEARCH();//se buscan todos los edeficos que existan
					new CENTRO_ADD($datos);//se invoca la view y se le pasan los centros que se le puden 
					//asociar
				}
				else{
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->ADD();//se inserta
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');//se crea un edificio
					$valores = $CENTRO->RellenaDatos();//se recogen los valores de la tupla
					new CENTRO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$CENTRO = get_data_form();//se recogen los datos del formulario
					$respuesta = $CENTRO->DELETE();//se eliminan
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el CENTRO a editar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); // Creo el objeto
					$valores = $CENTRO->RellenaDatos(); // obtengo todos los datos de la tupla
					$EDIFICIO = NEW EDIFICIO_Model('','','','');//creo un nuevo edificio
					$datos = $EDIFICIO->SEARCH();//busco todos los edificios existentes
					if (is_array($valores))
					{
						new CENTRO_EDIT($valores,$datos); //invoco la vista de edit con los datos 
							//precargados y con los edificios existentes,para que se puedan asociar a uno
					}else
					{
						new MESSAGE($valores, '../Controller/CENTRO_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$CENTRO = get_data_form(); //recojo los valores del formulario

					$respuesta = $CENTRO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){//nos llega el centro al search por get
					new CENTRO_SEARCH();//vista de search
				}
				else{
					$CENTRO = get_data_form();//se recogen los datos del formulario
					$datos = $CENTRO->SEARCH();//busco con los datos que me pasan
					$lista = array('CODCENTRO','NOMBRECENTRO');//le paso una parte de los atributos como resultado de la busqueda

					new CENTRO_SHOWALL($lista, $datos, '../index.php');//invoco a la vista de search
				}
				break;
			case 'SHOWCURRENT':
				$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');//creo un nuevo centro
				$valores = $CENTRO->RellenaDatos();//relleno los datos de una tupla concreta
				new CENTRO_SHOWCURRENT($valores);//y muestro estos datos en la vista de showcurrent
				break;
			default://caso por defecto, muestro todas las tuplas
				if (!$_POST){
					$CENTRO = new CENTRO_Model('','','','','');//creoun centro
				}
				else{
					$CENTRO = get_data_form();//se recogen los datos del formulario
				}
				$datos = $CENTRO->SEARCH();//hago un search de todas las tuplas de centro
				$lista = array('CODCENTRO','NOMBRECENTRO');//le paso una parte de los atributos para mostrar
				new CENTRO_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
