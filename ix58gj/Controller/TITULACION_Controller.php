<?php
//controla la gestion de TITULACION
	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/TITULACION_Model.php';
	include '../Model/CENTRO_Model.php';
	include '../View/TITULACION_SHOWALL_View.php';
	include '../View/TITULACION_SEARCH_View.php';
	include '../View/TITULACION_ADD_View.php';
	include '../View/TITULACION_EDIT_View.php';
	include '../View/TITULACION_DELETE_View.php';
	include '../View/TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia TITULACION y la devuelve
	function get_data_form(){

	
	if (!isset($_POST['CODTITULACION'])){
        $_POST['CODTITULACION'] = '';
    }
	if (!isset($_POST['CODCENTRO'])){
        $_POST['CODCENTRO'] = '';
    }
	if (!isset($_POST['NOMBRETITULACION'])){
        $_POST['NOMBRETITULACION'] = '';
    }
    if (!isset($_POST['RESPONSABLETITULACION'])){
        $_POST['RESPONSABLETITULACION'] = '';
    }

		$centro = new TITULACION_Model($_POST['CODTITULACION'],$_POST['CODCENTRO'],$_POST['NOMBRETITULACION'],$_POST['RESPONSABLETITULACION']);

		return $centro;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de 
					$CENTRO = NEW CENTRO_Model('','','','','');//se crea un cento
					$datos = $CENTRO->SEARCH();//se busca a todos los centros
					new TITULACION_ADD($datos);//se invoca a la view y se le pasan los centros que se le 
					//pueden asignar
				}
				else{
					$TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $TITULACION->ADD();//se añade
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','');//se crea una titulacion
					$valores = $TITULACION->RellenaDatos();//se recogen todos los valores de esa titulacion
					new TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$TITULACION = get_data_form();//se recogen los datos del formulario
					$respuesta = $TITULACION->DELETE();//se borra
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); // Creo el objeto
					$valores = $TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					$CENTRO = NEW CENTRO_Model('','','','','');//se crea un centro
					$datos = $CENTRO->SEARCH();//se buscan que centro hay
					if (is_array($valores))
					{
						new TITULACION_EDIT($valores,$datos); //invoco la vista de edit con los datos 
							//precargados y los centros a los que se le pueden asignar
					}else
					{
						new MESSAGE($valores, '../Controller/TITULACION_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $TITULACION->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php'); //mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new TITULACION_SEARCH();//se invoca a la vista
				}
				else{
					$TITULACION = get_data_form();//se recogen los datos del formulario
					$datos = $TITULACION->SEARCH();//busco con los datos que me pasan
					$lista = array('CODTITULACION','NOMBRETITULACION');//atributos que le paso para mostar como resultado de la busqueda

					new TITULACION_SHOWALL($lista, $datos, '../index.php');//invoco a la vista
				}
				break;
			case 'SHOWCURRENT':
				$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','');//se crea una titulacion
				$valores = $TITULACION->RellenaDatos();//relleno con los datos de una tupla concreta
				new TITULACION_SHOWCURRENT($valores);//y los muestro en la vista
				break;
			default://caso por defecto,muestro todas las tuplas
				if (!$_POST){
					$TITULACION = new TITULACION_Model('','','','');//se crea una titulacion
				}
				else{
					$TITULACION = get_data_form();//se recogen los datos del formulario
				}
				$datos = $TITULACION->SEARCH();//busco todas las tuplas
				$lista = array('CODTITULACION','NOMBRETITULACION');//y muestro un par de atributos de esas tablas
				new TITULACION_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
