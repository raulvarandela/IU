<?php
//Archivo : PROFESOR_Controller
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: controla la gestion de los PROFESORs
//-------------------------------------------------------

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/PROFESOR_Model.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia profesor y la devuelve
	function get_data_form(){

	if (!isset($_POST['DNI'])){
    $_POST['DNI'] = '';
    }
	if (!isset($_POST['NOMBREPROFESOR'])){
        $_POST['NOMBREPROFESOR'] = '';
    }
	if (!isset($_POST['APELLIDOSPROFESOR'])){
        $_POST['APELLIDOSPROFESOR'] = '';
    }
	if (!isset($_POST['AREAPROFESOR'])){
        $_POST['AREAPROFESOR'] = '';
    }
    if (!isset($_POST['DEPARTAMENTOPROFESOR'])){
        $_POST['DEPARTAMENTOPROFESOR'] = '';
    }

		$profesor = new PROFESOR_Model($_POST['DNI'],$_POST['NOMBREPROFESOR'],$_POST['APELLIDOSPROFESOR'],$_POST['AREAPROFESOR'],$_POST['DEPARTAMENTOPROFESOR']);

		return $profesor;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add 
					new PROFESOR_ADD();
				}
				else{
					$PROFESOR = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR->ADD();//se añade
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');//se crea un nuevo profesor
					$valores = $PROFESOR->RellenaDatos();//se recogen los valores
					new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR = get_data_form();//recojo los valores del formulario
					$respuesta = $PROFESOR->DELETE();//se borra
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); // Creo el objeto
					$valores = $PROFESOR->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROFESOR_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$PROFESOR = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROFESOR_SEARCH();//se invoca a la vista
				}
				else{
					$PROFESOR = get_data_form();//recojo los valores del formulario
					$datos = $PROFESOR->SEARCH();//busco con los datos que me pasan
					$lista = array('DNI','NOMBREPROFESOR');//estos son los atributos que voy mostrar como resultado de la busqueda

					new PROFESOR_SHOWALL($lista, $datos, '../index.php');//invoco a la vista
				}
				break;
			case 'SHOWCURRENT':
				$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');//se crea un profesor
				$valores = $PROFESOR->RellenaDatos();//relleno los datos de una tupla concreta
				new PROFESOR_SHOWCURRENT($valores);//y los muestro en la vista
				break;
			default://caso por defecto, muestro todas las tuplas
				if (!$_POST){
					$PROFESOR = new PROFESOR_Model('','','','','');//se crea un profesor
				}
				else{
					$PROFESOR = get_data_form();//recojo los valores del formulario
				}
				$datos = $PROFESOR->SEARCH();//busco todas las tuplas de PROFESOR
				$lista = array('DNI','NOMBREPROFESOR');//y muestro un par de atributos
				new PROFESOR_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
