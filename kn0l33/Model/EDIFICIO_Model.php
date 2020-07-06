<?php

//Clase : EDIFICIO_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza todas las operaciones de edificio
//-------------------------------------------------------

class EDIFICIO_Model {


	//declaracion de variables
	var $CODEDIFICIO; //almacena el código de edificio
	var $NOMBREEDIFICIO;//alamacena el nombre del edifico
	var $DIRECCIONEDIFICIO;//alamcena la dirección del edifico
	var $CAMPUSEDIFICIO;//almacena el campus donde está el edificio
	var $mysqli;//conexión con la BD

//Constructor de la clase
//

function __construct($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO){


	$this->CODEDIFICIO = $CODEDIFICIO;
	$this->NOMBREEDIFICIO= $NOMBREEDIFICIO;
	$this->DIRECCIONEDIFICIO = $DIRECCIONEDIFICIO;
	$this->CAMPUSEDIFICIO = $CAMPUSEDIFICIO;
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

	

	$toret = $this->Comprobar_CODEDIFICIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret = $this->Comprobar_NOMBREEDIFICIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_DIRECCIONEDIFICIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_CAMPUSEDIFICIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}


	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
		return $errores;
	}	

	
}

//funcion que comprueba el codigo de edificio esté bien escrito
function Comprobar_CODEDIFICIO(){
	$correcto = true;
	$nombreatributo = 'CODEDIFICIO';
	$errores = array();
	if (strlen($this->CODEDIFICIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODEDIFICIO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODEDIFICIO)>10){//compruebo que no sea mayor de 10
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/",$this->CODEDIFICIO)){//compruebo que el codigo tenga el formato pedido
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

//comprueba que el nombre del edificio es el adecuado
function Comprobar_NOMBREEDIFICIO(){
	$correcto=true;
	$nombreatributo='NOMBREEDIFICIO';
	$errores = array();
	if (strlen($this->NOMBREEDIFICIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBREEDIFICIO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBREEDIFICIO)>50){//compruebo que no sea mayor de 50
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->NOMBREEDIFICIO)){//compuebo que sea el formato que me piden
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

//comprueba que la direccion es la adecuada
function Comprobar_DIRECCIONEDIFICIO(){
	$correcto=true;
	$nombreatributo='DIRECCIONEDIFICIO';
	$errores = array();
	if (strlen($this->DIRECCIONEDIFICIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DIRECCIONEDIFICIO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DIRECCIONEDIFICIO)>150){//compruebo que no sea mayor de 150
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/^[a-zA-ZñÑÀ-ÿ0-9 ºª\-\/]{3,}$/",$this->DIRECCIONEDIFICIO)){ //compruebo que la dirección tenga el formato pedido
		$error = 'Solo están permitidas alfabéticos, números y los símbolos  “- / º ª” ';
		$codigo = '00050';
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


//comprueba que el campus es el adecuado
function Comprobar_CAMPUSEDIFICIO(){
	$correcto=true;
	$nombreatributo='CAMPUSEDIFICIO';
	$errores = array();
	if (strlen($this->CAMPUSEDIFICIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CAMPUSEDIFICIO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CAMPUSEDIFICIO)>10){//compuebo que no sea mayor que 10
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->CAMPUSEDIFICIO)){//compuebo que sea el formato que me piden
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
		//compruebo que no existe el edifio que quiero añadir
		$sql = "select * from EDIFICIO where CODEDIFICIO = '".$this->CODEDIFICIO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el edificio
				return 'Inserción fallida: el elemento ya existe';
			}


		$sql = "INSERT INTO EDIFICIO (
			
			CODEDIFICIO,
			NOMBREEDIFICIO,
			DIRECCIONEDIFICIO,
			CAMPUSEDIFICIO
			) 
				VALUES (
					
					'".$this->CODEDIFICIO."',
					'".$this->NOMBREEDIFICIO."',
					'".$this->DIRECCIONEDIFICIO."',
					'".$this->CAMPUSEDIFICIO."'
					)";

		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';//operación incorrecta
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
            FROM EDIFICIO
            WHERE 
                CODEDIFICIO LIKE '%".$this->CODEDIFICIO."%'
                AND NOMBREEDIFICIO LIKE '%".$this->NOMBREEDIFICIO."%'
                AND DIRECCIONEDIFICIO LIKE '%".$this->DIRECCIONEDIFICIO."%'
                AND CAMPUSEDIFICIO LIKE '%".$this->CAMPUSEDIFICIO."%'
            ";
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}
	return $resultado;
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	//compruebo que no tiene asociado espacios ni centros
  $sql = "select * from ESPACIO where CODEDIFICIO = '".$this->CODEDIFICIO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}
		if ($result->num_rows >0){  //existe al menos una tupla
				return 'No se puede eliminar: hay al menos un espacio asociado a este edifico';
			}

	$sql = "select * from CENTRO where CODEDIFICIO = '".$this->CODEDIFICIO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}
		if ($result->num_rows >0){  //existe al menos una tupla
				return 'No se puede eliminar: hay al menos un centro asociado a este edifico';
			}

   $sql = "	DELETE FROM 
   				EDIFICIO
   			WHERE(
   				CODEDIFICIO = '$this->CODEDIFICIO'
   			)
   			";

   	if ($this->mysqli->query($sql))
	{
		$resultado = 'Borrado realizado con éxito';//operación correcta
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';//operación incorrecta
	}
	return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    $sql = "SELECT *
			FROM EDIFICIO
			WHERE (
				(CODEDIFICIO = '$this->CODEDIFICIO') 
			)";

	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos';//operación incorrecta
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
	$sql = "UPDATE EDIFICIO
                    SET  NOMBREEDIFICIO = '$this->NOMBREEDIFICIO', DIRECCIONEDIFICIO = '$this->DIRECCIONEDIFICIO', CAMPUSEDIFICIO  = '$this->CAMPUSEDIFICIO'
                    WHERE ( CODEDIFICIO = '$this->CODEDIFICIO' )
                 ";
	if ($this->mysqli->query($sql))
	{
		$resultado = 'Actualización realizada con éxito';//operación correcta
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';//operación incorrecta
	}
	return $resultado;
}






}//fin de clase

?> 