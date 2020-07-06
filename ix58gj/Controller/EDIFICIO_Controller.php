<?php
//controla la gestion de los edificios
	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia edificio y la devuelve
	function get_data_form(){

	
	if (!isset($_POST['CODEDIFICIO'])){
        $_POST['CODEDIFICIO'] = '';
    }
	if (!isset($_POST['NOMBREEDIFICIO'])){
        $_POST['NOMBREEDIFICIO'] = '';
    }
	if (!isset($_POST['DIRECCIONEDIFICIO'])){
        $_POST['DIRECCIONEDIFICIO'] = '';
    }
    if (!isset($_POST['CAMPUSEDIFICIO'])){
        $_POST['CAMPUSEDIFICIO'] = '';
    }

		$centro = new EDIFICIO_Model($_POST['CODEDIFICIO'],$_POST['NOMBREEDIFICIO'],$_POST['DIRECCIONEDIFICIO'],$_POST['CAMPUSEDIFICIO']);

		return $centro;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de edificio
					new EDIFICIO_ADD();//se invoca a la vista
				}
				else{
					$EDIFICIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $EDIFICIO->ADD();//se añade
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');//se crea un edificio
					$valores = $EDIFICIO->RellenaDatos();//se recogen los valores de la tupla de un edificio
					new EDIFICIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$EDIFICIO = get_data_form();//se recogen los datos del formulario
					$respuesta = $EDIFICIO->DELETE();//se elimina
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); // Creo el objeto
					$valores = $EDIFICIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new EDIFICIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$EDIFICIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $EDIFICIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){//nos llega el edificio a search por get
					new EDIFICIO_SEARCH();//se invoca a la vista
				}
				else{
					$EDIFICIO = get_data_form();//se recogen los datos del formulario
					$datos = $EDIFICIO->SEARCH();//busco con los datos que me pasan
					$lista = array('CODEDIFICIO');//le paso una parte de los atributos como resultado

					new EDIFICIO_SHOWALL($lista, $datos, '../index.php');//invoco a la vista de search
				}
				break;
			case 'SHOWCURRENT':
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');//se crea un nuevo edificio
				$valores = $EDIFICIO->RellenaDatos();//relleno los datos de una tupla concreta
				new EDIFICIO_SHOWCURRENT($valores);//y muestro estos datos en la vista de showcurrent
				break;
			default://caso por defecto, muestro todas las tuplas
				if (!$_POST){
					$EDIFICIO = new EDIFICIO_Model('','','','');//se crea un edificio
				}
				else{
					$EDIFICIO = get_data_form();//se recogen los datos del formulario
				}
				$datos = $EDIFICIO->SEARCH();//hago un search de todas las tuplas de edificio
				$lista = array('CODEDIFICIO');//le paso una parte de los atributos para mostar
				new EDIFICIO_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
