<?php

//Clase : PROFESOR_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza las operaciones de profesor
//-------------------------------------------------------
class PROFESOR_Model {

	//declaracion de variables
	var $DNI; //alacena el DNI del profesor
	var $NOMBREPROFESOR; //alacena el nombre
	var $APELLIDOSPROFESOR; //almacena los apellidos
	var $AREAPROFESOR; //almacena el area del profesor
	var $DEPARTAMENTOPROFESOR; //almacena el dept. del profesor
	var $mysqli; //conexion con la BD

//Constructor de la clase
//

function __construct($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR){

	
	$this->DNI= $DNI;
	$this->NOMBREPROFESOR = $NOMBREPROFESOR;
	$this->APELLIDOSPROFESOR = $APELLIDOSPROFESOR;
	$this->AREAPROFESOR= $AREAPROFESOR;
	$this->DEPARTAMENTOPROFESOR = $DEPARTAMENTOPROFESOR;
	
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

	$toret = $this->Comprobar_DNI();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret = $this->Comprobar_NOMBREPROFESOR();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret = $this->Comprobar_APELLIDOSPROFESOR();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret = $this->Comprobar_AREAPROFESOR();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret = $this->Comprobar_DEPARTAMENTOPROFESOR();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	
	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
		return $errores;
	}
}

// function Comprobar_NOMBREPROFESOR()
// Comprueba el formato del nombre 
//	alfanumerico
//	mayor o igual a 3
// 	menor o igual a 15
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_NOMBREPROFESOR()
{
	$correcto = true;
	$nombreatributo= 'NOMBREPROFESOR';
	$errores = array();

	if (strlen($this->NOMBREPROFESOR)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBREPROFESOR)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBREPROFESOR)>15){//compruebo que no es mayor que 15
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->NOMBREPROFESOR)){//compruebo la expresión regular
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

//compruebo que los apellidos del profesor sean los correctos
function Comprobar_APELLIDOSPROFESOR()
{
	$correcto = true;
	$nombreatributo= 'APELLIDOSPROFESOR';
	$errores = array();

	if (strlen($this->APELLIDOSPROFESOR)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->APELLIDOSPROFESOR)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->APELLIDOSPROFESOR)>30){//compruebo que no es mayor que 30
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->APELLIDOSPROFESOR)){//compruebo la expresión regular
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

//compruebo que el area sea la pedida
function Comprobar_AREAPROFESOR()
{
	$correcto = true;
	$nombreatributo= 'AREAPROFESOR';
	$errores = array();

	if (strlen($this->AREAPROFESOR)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->AREAPROFESOR)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->AREAPROFESOR)>60){//compruebo que no es mayor que 60
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->AREAPROFESOR)){//compruebo la expresión regular
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

//compruebo que el departamento sea el correcto
function Comprobar_DEPARTAMENTOPROFESOR()
{
	$correcto = true;
	$nombreatributo= 'DEPARTAMENTOPROFESOR';
	$errores = array();

	if (strlen($this->DEPARTAMENTOPROFESOR)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DEPARTAMENTOPROFESOR)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DEPARTAMENTOPROFESOR)>60){//compruebo que no es mayor que 60
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->DEPARTAMENTOPROFESOR)){//compruebo la expresión regular
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



//comprueba que el formato de dni sea el adecuado
function Comprobar_DNI(){
	$correcto= true;
	$nombreatributo='DNI';
	$errores = array();
	$letra = substr($this->DNI, -1);
	$numeros = substr($this->DNI, 0, -1);

	if (strlen($this->DNI)===0){//compruebo que no sea null
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DNI)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DNI)>9){//compruebo que no es mayor que 30
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/^\d{8}[A-Z]$/",$this->DNI)){//compruebo que sea 8 numeros y 1 letra
		$error = 'Formato dni erróneo';
		$codigo = '00010';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;

	}

	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) != $letra || strlen($letra) != 1 || strlen ($numeros) != 8 ){//compruebo que la letra se corresponda con los numeros
		$error = 'Dni no válido';
		$codigo = '00011';
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
	//compruebo de que el profesor que se quiere añadir no este ya en la BD
		$sql = "select * from PROFESOR where DNI = '".$this->DNI."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows == 1){  // existe el profesor
				return 'Inserción fallida: el elemento ya existe';
			}



		$sql = "INSERT INTO PROFESOR (
			DNI,
			NOMBREPROFESOR,
			APELLIDOSPROFESOR,
			AREAPROFESOR,
			DEPARTAMENTOPROFESOR
			) 
				VALUES (
					'".$this->DNI."',
					'".$this->NOMBREPROFESOR."',
					'".$this->APELLIDOSPROFESOR."',
					'".$this->AREAPROFESOR."',
					'".$this->DEPARTAMENTOPROFESOR."'
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
            FROM PROFESOR
            WHERE 
                DNI LIKE '%".$this->DNI."%'
                AND NOMBREPROFESOR LIKE '%".$this->NOMBREPROFESOR."%'
                AND APELLIDOSPROFESOR LIKE '%".$this->APELLIDOSPROFESOR."%'
                AND AREAPROFESOR LIKE '%".$this->AREAPROFESOR."%'
                AND DEPARTAMENTOPROFESOR LIKE '%".$this->DEPARTAMENTOPROFESOR."%'

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
	//compruebo que  no tenga un PROF_ESPACIO ni un PROF_TITULACION asociado
	$sql = "select * from PROF_ESPACIO where DNI = '".$this->DNI."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows >0){  // existe al menos una tupla
				return 'No se puede eliminar: este profesor esta asociado a un espacio';
			}

	$sql = "select * from PROF_TITULACION where DNI = '".$this->DNI."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows >0){  // existe al menos una tupla
				return 'No se puede eliminar: este profesor imparte un titulo';
			}
   $sql = "	DELETE FROM 
   				PROFESOR
   			WHERE(
   				DNI = '$this->DNI'
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
			FROM PROFESOR
			WHERE (
				(DNI = '$this->DNI') 
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
	$sql = "UPDATE PROFESOR
                    SET  NOMBREPROFESOR = '$this->NOMBREPROFESOR', APELLIDOSPROFESOR  = '$this->APELLIDOSPROFESOR',AREAPROFESOR = '$this->AREAPROFESOR',DEPARTAMENTOPROFESOR = '$this->DEPARTAMENTOPROFESOR'
                    WHERE ( DNI = '$this->DNI' )
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