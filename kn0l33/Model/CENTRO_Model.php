<?php

//Clase : CENTRO_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza todas las operaciones de centro
//-------------------------------------------------------

class CENTRO_Model {

//declaro las variables que corresponden a los atributos de la base de datos
	var $CODCENTRO; //almacena el código de centro
	var $CODEDIFICIO; //almacena el código de edificio
	var $NOMBRECENTRO; //almacena el nombre del centro
	var $DIRECCIONCENTRO;//almacena la dirección del centro
	var $RESPONSABLECENTRO;//almacena el nombre del responsable del centro
	var $mysqli;//conexión con la BD

//
//Constructor de la clase

function __construct($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO){

	$this->CODCENTRO = $CODCENTRO;
	$this->CODEDIFICIO = $CODEDIFICIO;
	$this->NOMBRECENTRO= $NOMBRECENTRO;
	$this->DIRECCIONCENTRO = $DIRECCIONCENTRO;
	$this->RESPONSABLECENTRO = $RESPONSABLECENTRO;
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
	$toret = $this->Comprobar_NOMBRECENTRO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_DIRECCIONCENTRO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret = $this->Comprobar_RESPONSABLECENTRO();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
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

//comprueba que el nombre del centro es el adecuado
function Comprobar_NOMBRECENTRO(){
	$correcto=true;
	$nombreatributo='NOMBRECENTRO';
	$errores = array();

	if (strlen($this->NOMBRECENTRO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBRECENTRO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->NOMBRECENTRO)>50){//compuebo que no sea mayor que 50
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->NOMBRECENTRO)){//compuebo que sea el formato que me piden
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
function Comprobar_DIRECCIONCENTRO(){
	$correcto=true;
	$nombreatributo='DIRECCIONCENTRO';
	$errores = array();

	if (strlen($this->DIRECCIONCENTRO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DIRECCIONCENTRO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->DIRECCIONCENTRO)>150){//compuebo que no sea mayor que 150
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/^[a-zA-ZñÑÀ-ÿ0-9 ºª\-\/]{3,}$/",$this->DIRECCIONCENTRO)){ //compruebo que la dirección tenga el formato pedido
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

//comprueba que el responsable del centro es el adecuado
function Comprobar_RESPONSABLECENTRO(){
	$correcto=true;
	$nombreatributo='RESPONSABLECENTRO';
	$errores = array();

	if (strlen($this->RESPONSABLECENTRO)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->RESPONSABLECENTRO)<3){//compruebo que no sea menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->RESPONSABLECENTRO)>60){//compuebo que no sea mayor que 60
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->RESPONSABLECENTRO)){//compuebo que sea el formato que me piden
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
		//compruebo que no existe el centro que ya que quiere añadir
		$sql = "select * from CENTRO where CODCENTRO = '".$this->CODCENTRO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacon incorrecta
		}

		if ($result->num_rows == 1){  // existe el CENTRO
				return 'Inserción fallida: el elemento ya existe';
			}

		//inserto el centro
		$sql = "INSERT INTO CENTRO ( 
			CODCENTRO,
			CODEDIFICIO,
			NOMBRECENTRO,
			DIRECCIONCENTRO,
			RESPONSABLECENTRO
			) 
				VALUES (
					'".$this->CODCENTRO."',
					'".$this->CODEDIFICIO."',
					'".$this->NOMBRECENTRO."',
					'".$this->DIRECCIONCENTRO."',
					'".$this->RESPONSABLECENTRO."'
					)";

		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';//operacon incorrecta
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
            FROM CENTRO
            WHERE 
                CODCENTRO LIKE '%".$this->CODCENTRO."%'
                AND CODEDIFICIO LIKE '%".$this->CODEDIFICIO."%'
                AND NOMBRECENTRO LIKE '%".$this->NOMBRECENTRO."%'
                AND DIRECCIONCENTRO LIKE '%".$this->DIRECCIONCENTRO."%'
                AND RESPONSABLECENTRO LIKE '%".$this->RESPONSABLECENTRO."%'
            ";
	if (!$resultado = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacon incorrecta
		}
	return $resultado;
    
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
   	//compruebo que no tenga titulaciones ni espacios asociados
   	$sql = "select * from TITULACION where CODCENTRO = '".$this->CODCENTRO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacon incorrecta
		}
		if ($result->num_rows > 0){  //existe al menos una tupla con la clave
				return 'No se puede eliminar: hay almenos una Titulacion asociada a este centro';
			}

	$sql = "select * from ESPACIO where CODCENTRO = '".$this->CODCENTRO."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacon incorrecta
		}
		if ($result->num_rows > 0){  //existe al menos una tupla con la clave
				return 'No se puede eliminar: hay almenos un espacio asociado a este centro';
			}

   $sql = "	DELETE FROM 
   				CENTRO
   			WHERE(
   				CODCENTRO = '$this->CODCENTRO'
   			)
   			";

   	if ($this->mysqli->query($sql))
	{
		$resultado = 'Borrado realizado con éxito';//se ha borrando corectamente
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';//operacon incorrecta
	}
	return $resultado;
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
    $sql = "SELECT *
			FROM CENTRO
			WHERE (
				(CODCENTRO = '$this->CODCENTRO') 
			)";

	if (!$resultado = $this->mysqli->query($sql))
	{
			return 'Error de gestor de base de datos';//operacon incorrecta
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
	$sql = "UPDATE CENTRO
                    SET CODEDIFICIO = '$this->CODEDIFICIO', NOMBRECENTRO = '$this->NOMBRECENTRO', DIRECCIONCENTRO = '$this->DIRECCIONCENTRO', RESPONSABLECENTRO  = '$this->RESPONSABLECENTRO'
                    WHERE ( CODCENTRO = '$this->CODCENTRO' )
                 ";
	if ($this->mysqli->query($sql))
	{
		$resultado = 'Actualización realizada con éxito';//operacon correcta
	}
	else
	{
		$resultado = 'Error de gestor de base de datos';//operacon incorrecta
	}
	return $resultado;
}






}//fin de clase

?> 