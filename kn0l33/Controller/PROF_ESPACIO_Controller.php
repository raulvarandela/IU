<?php
//Archivo : PROF_ESPACIO_Controller
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: controla la gestion de los PROF_ESPACIOs
//-------------------------------------------------------


	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	include '../Model/PROF_ESPACIO_Model.php';
	include '../Model/PROFESOR_Model.php';
	include '../Model/ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia prof_espacio y la devuelve
	function get_data_form(){

	if (!isset($_POST['DNI'])){//compuebo si llega por el metodo POST
    $_POST['DNI'] = '';
    }
	if (!isset($_POST['CODESPACIO'])){//compuebo si llega por el metodo POST
        $_POST['CODESPACIO'] = '';
    }
	

		$prof_espacio = new PROF_ESPACIO_Model($_POST['DNI'],$_POST['CODESPACIO']);

		return $prof_espacio;
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
					$datosPROFESOR = $PROFESOR->SEARCH();//se buscan los profesores que existen
					$ESPACIO = NEW ESPACIO_Model('','','','','','');//se  crea un espacio
					$datosESPACIO = $ESPACIO->SEARCH();//se buncan los espacios que existen
					new PROF_ESPACIO_ADD($datosPROFESOR,$datosESPACIO);//se invoca a la vista pasandoles
					//los profesores y espacios que se le pueden asignar
				}
				else{
					$PROF_ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_ESPACIO->ADD();//se añade
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']);//se crea un nuevo prof_espacio
					$valores = $PROF_ESPACIO->RellenaDatos();//se recogen todos los valores
					new PROF_ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_ESPACIO = get_data_form();//se recogen los datos del formulario
					$respuesta = $PROF_ESPACIO->DELETE();//se elimina
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');//mensaje por pantalla
				}
				break;
			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); // Creo el objeto
					$valores = $PROF_ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROF_ESPACIO_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');//mensaje por pantalla
					}
				}
				else{

					$PROF_ESPACIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROF_ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');//mensaje por pantalla
				}

				break;
			case 'SEARCH':
				if (!$_POST){//nos llega el prof_espacio a  search por get
					new PROF_ESPACIO_SEARCH();//se invoca a la vista
				}
				else{
					$PROF_ESPACIO = get_data_form();//recojo los valores del formulario
					$datos = $PROF_ESPACIO->SEARCH();//busco con los datos que me pasan
					$lista = array('DNI','CODESPACIO');//le paso uan parte de los atributos como resultado

					new PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php');//invoco a la vista de search
				}
				break;
			case 'SHOWCURRENT':
				$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']);//creo un
				// prof_espacio
				$valores = $PROF_ESPACIO->RellenaDatos();//relleno los datos de una tupla concreta
				new PROF_ESPACIO_SHOWCURRENT($valores);//y muestro estos datos en la vista de showcurrent
				break;
			default://caso por defecto, muestro todas las tuplas
				if (!$_POST){
					$PROF_ESPACIO = new PROF_ESPACIO_Model('','');//crea un prof_espacio
				}
				else{
					$PROF_ESPACIO = get_data_form();//recojo los valores del formulario
				}
				$datos = $PROF_ESPACIO->SEARCH();//hago un search de todas las tuplas de PROF_ESPACIO
				$lista = array('DNI','CODESPACIO');//le paso una parte de los atributos para mostar
				new PROF_ESPACIO_SHOWALL($lista, $datos);//invoco a la vista
		}

?>
