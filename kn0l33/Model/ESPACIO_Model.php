<?php

//Clase : ESPACIO_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza todas las operaciones de espacio
//-------------------------------------------------------

class ESPACIO_Model {

//declaración de variables
	var $CODESPACIO; //almacena el código de espacio
	var $CODEDIFICIO;//almacena el código de edificio
	var $CODCENTRO;//almacena el código de centro
	var $TIPO;//almacena el tipo de espacio
	var $SUPERFICIEESPACIO; ////almacena la superficie
	var $NUMINVENTARIOESPACIO;//almacena el inventario
	var $mysqli;//conexión con la BD

//Constructor de la clase
//

function __construct($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO){

	$this->CODESPACIO = $CODESPACIO;
	$this->CODEDIFICIO = $CODEDIFICIO;
	$this->CODCENTRO= $CODCENTRO;
	$this->TIPO = $TIPO;
	$this->SUPERFICIEESPACIO = $SUPERFICIEESPACIO;
	$this->NUMINVENTARIOESPACIO=$NUMINVENTARIOESPACIO;
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

	

	$toret = $this->Comprobar_CODCENTRO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret = $this->Comprobar_CODEDIFICIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_CODESPACIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_Tipo();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_SUPERFICIEESPACIO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_NUMINVENTARIOESPACIO();
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
	if (!preg_match("/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/",$this->CODCENTRO)){//compruebo que el codigo tenga el formato pedido
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
	if (!preg_match("/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/",$this->CODESPACIO)){//compruebo que el codigo tenga el formato pedido
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

//comprueba que el tipo sea PAS, Laboratorio o despacho
function Comprobar_Tipo(){
	$correcto = true;
	$nombreatributo = 'TIPO';
	$errores = array();
	if (strlen($this->TIPO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if($this->TIPO!='DESPACHO' & $this->TIPO!='LABORATORIO' & $this->TIPO!='PAS'){//compruebo que el enumerado tenga los valores PAS, DESPACHO O LABORATORIO
		$error = "Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS' (tipo)";
		$codigo = '00080';
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

//comprueba que la superfcie cumple los requisitos
function Comprobar_SUPERFICIEESPACIO(){
	$correcto = true;
	$nombreatributo = 'SUPERFICIEESPACIO';
	$errores = array();
	if (strlen($this->SUPERFICIEESPACIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->SUPERFICIEESPACIO)<1){//compruebo que no sea menor que 1
		$error = 'Valor de atributo numérico demasiado corto';
		$codigo = '00004';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->SUPERFICIEESPACIO)>4){//compuebo que no sea mayor que 4
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/[0-9]/",$this->SUPERFICIEESPACIO)){//compuebo que sea numerico
		$error = 'Solo se permiten números';
		$codigo = '00070';
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

//comprueba que lel numero de inventario sea el correcto
function Comprobar_NUMINVENTARIOESPACIO(){
	$correcto = true;
	$nombreatributo = 'NUMINVENTARIOESPACIO';
	$errores = array();
	if (strlen($this->NUMINVENTARIOESPACIO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NUMINVENTARIOESPACIO)<1){//compruebo que no sea menor que 1
		$error = 'Valor de atributo numérico demasiado corto';
		$codigo = '00004';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NUMINVENTARIOESPACIO)>8){//compuebo que no sea mayor que 8
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/[0-9]/",$this->NUMINVENTARIOESPACIO)){//compuebo que sea numerico
		$error = 'Solo se permiten números';
		$codigo = '00070';
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
	//compruebo que el espacio que quiero añadir no este ya en la BD
		$sql = "select * from ESPACIO where 
	CODESPACIO = '".$this->CODESPACIO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows == 1){  // existe el espacio
				return 'Inserción fallida: el elemento ya existe';
			}


		$sql = "INSERT INTO ESPACIO (
			CODESPACIO,
			CODEDIFICIO,
			CODCENTRO,
			TIPO,
			SUPERFICIEESPACIO,
			NUMINVENTARIOESPACIO
			) 
				VALUES (
					'".$this->CODESPACIO."',
					'".$this->CODEDIFICIO."',
					'".$this->CODCENTRO."',
					'".$this->TIPO."',
					'".$this->SUPERFICIEESPACIO."',
					'".$this->NUMINVENTARIOESPACIO."'
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
            FROM ESPACIO
            WHERE 
                
	CODESPACIO LIKE '%".$this->CODESPACIO."%'
                AND CODEDIFICIO LIKE '%".$this->CODEDIFICIO."%'
                AND CODCENTRO LIKE '%".$this->CODCENTRO."%'
                AND TIPO LIKE '%".$this->TIPO."%'
                AND SUPERFICIEESPACIO LIKE '%".$this->SUPERFICIEESPACIO."%'
                AND NUMINVENTARIOESPACIO LIKE '%".$this->NUMINVENTARIOESPACIO."%'
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
	//compruebo que no tiene asociado PROF_ESPACIO
   $sql = "select * from PROF_ESPACIO where CODESPACIO = '".$this->CODESPACIO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows >0){  // existe al menos una tupla
				return 'No se puede eliminar: hay un profesor asociado a este espacio';
			}


   $sql = "	DELETE FROM 
   				ESPACIO
   			WHERE(CODESPACIO = '$this->CODESPACIO'
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
			FROM ESPACIO
			WHERE (
				(CODESPACIO = '$this->CODESPACIO') 
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
	$sql = "UPDATE ESPACIO
                    SET CODEDIFICIO = '$this->CODEDIFICIO', CODCENTRO = '$this->CODCENTRO', TIPO = '$this->TIPO', SUPERFICIEESPACIO  = '$this->SUPERFICIEESPACIO',NUMINVENTARIOESPACIO  = '$this->NUMINVENTARIOESPACIO'
                    WHERE ( CODESPACIO = '$this->CODESPACIO' )
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