<?php

//Clase : PROF_ESPACIO_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza las operaciones de los espacios asignados a profesores
//-------------------------------------------------------

class PROF_ESPACIO_Model {

	//declaracion de variables
	var $DNI; //almacena el DNI del profesor
	var $CODESPACIO; //almacena el código del espacio
	var $mysqli; //alamacena la conexión con la base de datos

//Constructor de la clase
//

function __construct($DNI,$CODESPACIO){

	
	$this->DNI= $DNI;
	$this->CODESPACIO = $CODESPACIO;
	
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
	$toret = $this->Comprobar_CODESPACIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
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


//funcion que comprueba el codigo del espacio esté bien escrito
function Comprobar_CODESPACIO(){
	$correcto = true;
	$nombreatributo = 'CODESPACIO';
	$errores = array();
	if (strlen($this->CODESPACIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODESPACIO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->CODESPACIO)>10){//compruebo que no sea mayor de 10
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/([a-zA-Z]|[0-9]|[-]){3,}/",$this->CODESPACIO)){//compruebo que el codigo tenga el formato pedido
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
	//compruebo que el PROF_ESPACIO no exista en al BD
		$sql = "select * from PROF_ESPACIO where DNI = '".$this->DNI."' AND CODESPACIO = '".$this->CODESPACIO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el PROF_ESPACIO
				return 'Inserción fallida: el elemento ya existe';
			}



		$sql = "INSERT INTO PROF_ESPACIO (
			DNI,
			CODESPACIO
			) 
				VALUES (
					'".$this->DNI."',
					'".$this->CODESPACIO."'
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
            FROM PROF_ESPACIO
            WHERE 
                DNI LIKE '%".$this->DNI."%'
                AND CODESPACIO LIKE '%".$this->CODESPACIO."%'
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
   $sql = "	DELETE FROM 
   				PROF_ESPACIO
   			WHERE(
   				DNI = '$this->DNI' AND CODESPACIO = '$this->CODESPACIO'
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
			FROM PROF_ESPACIO
			WHERE 
				(DNI = '$this->DNI' AND CODESPACIO = '$this->CODESPACIO')
			";

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
	$sql = "UPDATE PROF_ESPACIO
                    SET DNI = '$this->DNI' , CODESPACIO = '$this->CODESPACIO'
                    WHERE (DNI = '$this->DNI' AND CODESPACIO = '$this->CODESPACIO')
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