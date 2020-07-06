<?php
//Archivo : ESPACIO_Controller
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: controla la gestion de los Espacios
//-------------------------------------------------------


	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/ESPACIO_Model.php';
	include '../Model/CENTRO_Model.php';
	include '../Model/EDIFICIO_Model.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia espacio y la devuelve
	function get_data_form(){

	if (!isset($_POST['CODESPACIO'])){
    $_POST['CODESPACIO'] = '';
    }
	if (!isset($_POST['CODEDIFICIO'])){
        $_POST['CODEDIFICIO'] = '';
    }
	if (!isset($_POST['CODCENTRO'])){
        $_POST['CODCENTRO'] = '';
    }
	if (!isset($_POST['TIPO'])){
        $_POST['TIPO'] = '';
    }
    if (!isset($_POST['SUPERFICIEESPACIO'])){
        $_POST['SUPERFICIEESPACIO'] = '';
    }
    if (!isset($_POST['NUMINVENTARIOESPACIO'])){
        $_POST['NUMINVENTARIOESPACIO'] = '';
    }

		$espacio = new ESPACIO_Model($_POST['CODESPACIO'],$_POST['CODEDIFICIO'],$_POST['CODCENTRO'],$_POST['TIPO'],$_POST['SUPERFICIEESPACIO'],$_POST['NUMINVENTARIOESPACIO']);

		return $espacio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de espacio
					$EDIFICIO = NEW EDIFICIO_Model('','','','');//se crea un edificio
					$datosEdificio = $EDIFICIO->SEARCH();//se buscan todos los edificios existentes
					$CENTRO = NEW CENTRO_Model('','','','','');//se crea un centro
					$datosCentro = $CENTRO->SEARCH();//se buscan todos los centros existentes
					new ESPACIO_ADD($datosCentro,$datosEdificio);//se invoca a la vista con los centros y 
					//edificios que se le pueden asignar
				}
				else{
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->ADD();//se inserta
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');//se crea un espacio
					$valores = $ESPACIO->RellenaDatos();//se recogen los valores del espacio creado
					new ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$ESPACIO = get_data_form();//se recogen los datos del formulario
					$respuesta = $ESPACIO->DELETE();//se borra
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el centro a editar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); // Creo el objeto
					$valores = $ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					$EDIFICIO = NEW EDIFICIO_Model('','','','');//creo un edificio
					$datosEdificio = $EDIFICIO->SEARCH();//busco los edificios existentes
					$CENTRO = NEW CENTRO_Model('','','','','');//creo un centro
					$datosCentro = $CENTRO->SEARCH();//busco los edificios existentes
					if (is_array($valores))
					{
						new ESPACIO_EDIT($valores,$datosEdificio,$datosCentro); //invoco la vista de edit con los datos 
							//precargados y los centros y edificios que se le puedan asignar
					}else
					{
						new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){//nos llega el ESPACIO a  search por get
					new ESPACIO_SEARCH();//invoco a la vista
				}
				else{
					$ESPACIO = get_data_form();//se recogen los datos del formulario
					$datos = $ESPACIO->SEARCH();//busco con los datos que me pasan
					$lista = array('CODESPACIO','CODEDIFICIO');//le paso una parte de los atributos como resultado

					new ESPACIO_SHOWALL($lista, $datos, '../index.php');//invoco a la vista de search
				}
				break;
			case 'SHOWCURRENT':
				$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');//se crea un espacio
				$valores = $ESPACIO->RellenaDatos();//relleno los datos de una tupla concreta
				new ESPACIO_SHOWCURRENT($valores);//y muestro estos datos en la vista de showcurrent
				break;
			default://caso por defecto, muestro todas las tuplas
				if (!$_POST){
					$ESPACIO = new ESPACIO_Model('','','','','','');//se crea un espacio
				}
				else{
					$ESPACIO = get_data_form();//se recogen los datos del formulario
				}
				$datos = $ESPACIO->SEARCH();//hago un search de todas las tuplas de ESPACIO
				$lista = array('CODESPACIO','CODEDIFICIO');//le paso una parte de los atributos para mostar
				new ESPACIO_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
