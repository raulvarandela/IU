<?php
//Clase : TITULACION_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza las operaciones de titulación
//-------------------------------------------------------

class TITULACION_Model {


	//declaracion de variables
	var $CODTITULACION; //almacena el código de titulación	
	var $CODCENTRO; //almacena el código del centro donde se imparte
	var $NOMBRETITULACION; //almacena el nombre de la titulación
	var $RESPONSABLETITULACION; //almacena el nombre del responsable
	var $mysqli;//conexión con la BD

//Constructor de la clase
//

function __construct($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION){


	$this->CODTITULACION = $CODTITULACION;
	$this->CODCENTRO= $CODCENTRO;
	$this->NOMBRETITULACION = $NOMBRETITULACION;
	$this->RESPONSABLETITULACION = $RESPONSABLETITULACION;
	$this->erroresdatos = $this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}



// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function Comprobar_atributos()
{
	$errores = array();


	$toret = $this->Comprobar_CODTITULACION();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret =$this->Comprobar_CODCENTRO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_NOMBRETITULACION();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_RESPONSABLETITULACION();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}


	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
		return $errores;
	}
}

//comprueba si el codigo de titulacion es el correcto
function Comprobar_CODTITULACION(){
	$correcto= true;
	$nombreatributo='CODTITULACION';
	$errores = array();


	if (strlen($this->CODTITULACION)==0){//compruebo que no sea null
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODTITULACION)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODTITULACION)>10){//compruebo que no sea mayor de 10
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/([a-zA-Z]|[0-9])/",$this->CODTITULACION)){//compruebo que la expresión regular es la correcta
		$error = 'Solo se permiten alfabéticos y números ';
		$codigo = '00060';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if($correcto){
		return true;
	}else{
		return $errores;
	}
	
}

//funcion que comprueba el codigo de centro esté bien escrito
function Comprobar_CODCENTRO(){
	$correcto = true;
	$nombreatributo = 'CODCENTRO';
	$errores = array();


	if (strlen($this->CODCENTRO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODCENTRO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODCENTRO)>10){//compruebo que no sea mayor de 10
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/([a-zA-Z]|[0-9]|[-]){3,}/",$this->CODCENTRO)){//compruebo que el codigo tenga el formato pedido
		$error = 'Solo están permitidas alfabéticos, números y el “-”';
		$codigo = '00040';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}

	if($correcto){
		return true;
	}else{
		return $errores;
	}
}

//compruebo que el nombre de la titulación cumple con lo establecido
function Comprobar_NOMBRETITULACION()
{
	$correcto = true;
	$nombreatributo= 'NOMBRETITULACION';
	$errores = array();


	if (strlen($this->NOMBRETITULACION)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBRETITULACION)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBRETITULACION)>50){//compruebo que no es mayor que 50
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->NOMBRETITULACION)){//compruebo la expresión regular
		$error = 'Solo están permitidas alfabéticos';
		$codigo = '00030';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	
	if($correcto){
		return true;
	}else{
		return $errores;
	}
}

//compruebo que el responsable cumpla los requisitos
function Comprobar_RESPONSABLETITULACION()
{
	$correcto = true;
	$nombreatributo= 'RESPONSABLETITULACION';
	$errores = array();


	if (strlen($this->RESPONSABLETITULACION)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->RESPONSABLETITULACION)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->RESPONSABLETITULACION)>60){//compruebo que no es mayor que 60
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->RESPONSABLETITULACION)){//compruebo la expresión regular
		$error = 'Solo están permitidas alfabéticos';
		$codigo = '00030';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	
	if($correcto){
		return true;
	}else{
		return $errores;
	}
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
	$errores=$this->Comprobar_atributos();
	if ($errores!==	 true){//comprobamos si el array de errores es vacio
		return $errores;
	}
	//compruebo que no existe la titulacion que yo quiero añadir
		$sql = "select * from TITULACION where CODTITULACION = '".$this->CODTITULACION."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows == 1){  // existe la titulacion
				return 'Inserción fallida: el elemento ya existe';
			}


		$sql = "INSERT INTO TITULACION (
			
			CODTITULACION,
			CODCENTRO,
			NOMBRETITULACION,
			RESPONSABLETITULACION
			) 
				VALUES (
					
					'".$this->CODTITULACION."',
					'".$this->CODCENTRO."',
					'".$this->NOMBRETITULACION."',
					'".$this->RESPONSABLETITULACION."'
					)";

		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';//operacion incorrecta
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
}
    

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{
	unset($this);
}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
	$sql = "SELECT *
            FROM TITULACION
            WHERE 
                CODTITULACION LIKE '%".$this->CODTITULACION."%'
                AND CODCENTRO LIKE '%".$this->CODCENTRO."%'
                AND NOMBRETITULACION LIKE '%".$this->NOMBRETITULACION."%'
                AND RESPONSABLETITULACION LIKE '%".$this->RESPONSABLETITULACION."%'
            ";
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}
	return $resultado;
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	//comprobacion de que no se tenga asociado un PROF_TITULACION
   $sql = "select * from PROF_TITULACION where CODTITULACION = '".$this->CODTITULACION."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}
		if ($result->num_rows >0){  // existe al menos una tupla
				return 'No se puede eliminar: hay un profesor impartiendo este titulo';
			}

   $sql = "	DELETE FROM 
   				TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION'
   			)
   			";

   	if ($this->mysqli->query($sql))
	{
		$resultado = 'Borrado realizado con éxito';//operacion correcta
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';//operacion incorrecta
	}
	return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    $sql = "SELECT *
			FROM TITULACION
			WHERE (
				(CODTITULACION = '$this->CODTITULACION') 
			)";

	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos';//operacion incorrecta
	}else
	{
		$tupla = $resultado->fetch_array();
	}
	return $tupla;
}

// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{
	$errores=$this->Comprobar_atributos();
	if ($errores!==	 true){//comprobamos si el array de errores es vacio
		return $errores;
	}
	$sql = "UPDATE TITULACION
                    SET  CODCENTRO = '$this->CODCENTRO', NOMBRETITULACION = '$this->NOMBRETITULACION', RESPONSABLETITULACION  = '$this->RESPONSABLETITULACION'
                    WHERE ( CODTITULACION = '$this->CODTITULACION' )
                 ";
	if ($this->mysqli->query($sql))
	{
		$resultado = 'Actualización realizada con éxito';//operacion correcta
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';//operacion incorrecta
	}
	return $resultado;
}






}//fin de clase

?> 