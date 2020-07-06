<?php
//Archivo : PROF_TITULACION_Controller
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: controla la gestion de las titulaciones asignadas a profesores
//-------------------------------------------------------


	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/PROF_TITULACION_Model.php';
	include '../Model/PROFESOR_Model.php';
	include '../Model/TITULACION_Model.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SEARCH_View.php';
	include '../View/PROF_TITULACION_ADD_View.php';
	include '../View/PROF_TITULACION_EDIT_View.php';
	include '../View/PROF_TITULACION_DELETE_View.php';
	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_TITULACION y la devuelve
	function get_data_form(){

	if (!isset($_POST['DNI'])){//compuebo si llega por el metodo POST
    $_POST['DNI'] = '';
    }
	if (!isset($_POST['CODTITULACION'])){//compuebo si llega por el metodo POST
        $_POST['CODTITULACION'] = '';
    }
	if (!isset($_POST['ANHOACADEMICO'])){//compuebo si llega por el metodo POST
        $_POST['ANHOACADEMICO'] = '';
    }

		$prof_titulacion = new PROF_TITULACION_Model($_POST['DNI'],$_POST['CODTITULACION'],$_POST['ANHOACADEMICO']);

		return $prof_titulacion;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add 
					$PROFESOR = NEW PROFESOR_Model('','','','','');//se crea un profesor
					$datosPROFESOR = $PROFESOR->SEARCH();//busco cuantos profesores hay
					$TITULACION = NEW TITULACION_Model('','','','');//creo una titulacion
					$datosTITULACION = $TITULACION->SEARCH();//busco cuantas titulaciones hay
					new PROF_TITULACION_ADD($datosPROFESOR,$datosTITULACION);//invoco a las vistas con
					//las titulaciones y profesores que se le pueden asignar
				}
				else{
					$PROF_TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_TITULACION->ADD();//se añade
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');//mensaje por pantlla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],'');//se crea una tupla nueva
					$valores = $PROF_TITULACION->RellenaDatos();//se recogen los valores de esa tupla
					new PROF_TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_TITULACION = get_data_form();//recojo los valores del formulario
					$respuesta = $PROF_TITULACION->DELETE();//se elimina
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); // Creo el objeto
					$valores = $PROF_TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROF_TITULACION_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$PROF_TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROF_TITULACION->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){
					new PROF_TITULACION_SEARCH();//invoco a la vista
				}
				else{
					$PROF_TITULACION = get_data_form();//recojo los valores del formulario
					$datos = $PROF_TITULACION->SEARCH();//busco con los datos que me pasan
					$lista = array('DNI','CODTITULACION');//cargo unos pocos atributos para mostrar como resultado del search

					new PROF_TITULACION_SHOWALL($lista, $datos, '../index.php');//invoco a la vista de search
				}
				break;
			case 'SHOWCURRENT':
				$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],'');
				$valores = $PROF_TITULACION->RellenaDatos();//relleno los datos de una tupla concreta
				new PROF_TITULACION_SHOWCURRENT($valores);//y muestro estos datos en la vista de showcurrent
				break;
			default://caso por defecto, muestro todas las tuplas
				if (!$_POST){
					$PROF_TITULACION = new PROF_TITULACION_Model('','','');//se crea un nuevo prof_titulacion
				}
				else{
					$PROF_TITULACION = get_data_form();//recojo los valores del formulario
				}
				$datos = $PROF_TITULACION->SEARCH();//hago un search de todas las tuplas de PROF_TITULACION
				$lista = array('DNI','CODTITULACION');//le paso una parte de los atributos para mostar
				new PROF_TITULACION_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
