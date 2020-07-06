<?php
//Clase : USUARIOS_Model
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: realiza las operaciones de usuarios
//-------------------------------------------------------

class USUARIOS_Model {

//declaracion de variables
	var $login; //almacena el login
	var $password; //almacena la contraseña
	var $DNI; //almacena el DNI
	var $nombre; //almacena el nombre
	var $apellidos; //almacena los apellidos
	var $telefono; //almacena el teléfono
	var $email; //almacena el email
	var $FechaNacimiento; //alamacena la fecha de nacimiento
	var $sexo; //almacena el sexo
	var $fotopersonal; //alamcena la fotopersonal personal
	var $mysqli;//conexión con la BD

//Constructor de la clase
//

function __construct($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$fotopersonal,$sexo){

	$this->login = $login;
	$this->password = $password;
	$this->DNI= $DNI;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->telefono= $telefono;
	$this->email = $email;
	$this->FechaNacimiento= $FechaNacimiento;
	$this->sexo= $sexo;
	$this->fotopersonal = $fotopersonal;
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
	
	$toret=$this->Comprobar_login();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret=$this->Comprobar_nombre();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret=$this->Comprobar_password();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret=$this->Comprobar_DNI();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	$toret=$this->Comprobar_apellidos();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}	

	$toret=$this->Comprobar_telefono();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}	

	$toret=$this->Comprobar_email();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}	

	$toret=$this->Comprobar_FechaNacimiento();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}	

	$toret=$this->Comprobar_sexo();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}



	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
		return $errores;
	}	

}

//funcion que valida en back el login
function Comprobar_atributos_login(){
	$errores = array();
	
	$toret=$this->Comprobar_login();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}
	$toret=$this->Comprobar_password();
	if ($toret !== true){
		$errores = array_merge($errores,$toret);
	}

	if(count($errores)==0){//si el array está vacio no hay errores
		return true;
	}else{//si no lo está por lo tanto devuelvo el array
		return $errores;
	}
}

// function Comprobar_login()
// Comprueba el formato del login 
//	alfanumerico
//	mayor o igual a 3
// 	menor o igual a 15
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_login()
{
	$correcto = true;
	$nombreatributo = 'login';
	$errores = array();

	if (strlen($this->login)===0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->login)<3){//compruebo que el login no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->login)>15){//compruebo que el login no es mayor qur 15
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}if (!preg_match("/[a-zA-Z]/",$this->login)){//compruebo que la expresión regular es la adecuada
		$error = 'Solo se permiten alfabéticos';
		$codigo = '000090';
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

//funcion que comprueba las password que no sea vacia, que este en los limites y que sea del formato pedido
function Comprobar_password(){
	$correcto=true;
	$nombreatributo = 'password';
	$errores = array();
	if (strlen($this->password)==0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->password)<3){//compruebo que no es mas pequeño que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->password)>15){//compruebo que no es mayor que 20
		$error = 'Password demasiado larga';
		$codigo = '00005';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/[a-zA-Z]/",$this->password)){//compruebo que la expresión regular es la correcta
		$error = 'Solo se permiten alfabéticos';
		$codigo = '000090';
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


// function Comprobar_nombre()
// Comprueba el formato del nombre 
//	alfanumerico
//	mayor o igual a 3
// 	menor o igual a 30
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_nombre()
{
	$correcto = true;
	$nombreatributo= 'nombre';
	$errores = array();
	if (strlen($this->nombre)===0){//compruebo que no es vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->nombre)<3){//compruebo que no es menor que 3
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->nombre)>30){//compruebo que no es mayor que 30
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->nombre)){//compruebo la expresión regular
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

//comrpueba que los apellidos tenga el formato pedido
function Comprobar_apellidos(){
	$correcto=true;
	$nombreatributo='Apelleidos';
	$errores = array();
	if (strlen($this->apellidos)==0){//compruebo que no es nulo
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->apellidos)<3){//compruebo que tenga mas de 3 caracteres
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->apellidos)>50){//compruebo que no tenga más de 50 caracteres
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/(([a-zA-Z]|[ ]){3,})$/",$this->apellidos)){//compruebo que la expresión regular es la adecuada
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

//comprueba que el telefono tiene el formato adecuado
function Comprobar_telefono(){
	$correcto=true;
	$nombreatributo='Telefono';
	$errores = array();
	if (strlen($this->telefono)==0){//compruebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->telefono)<3){//compruebo que tenga mas de 3 caracteres
		$error = 'Valor de atributo numérico demasiado corto';
		$codigo = '00004';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->telefono)>11){//compruebo que no tenga más de 50 caracteres
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/^(\+34|0034|34)?([0-9]){9}$/",$this->telefono)){//compruebo que el telf. tenga la expresión pedida
		$error = 'Teléfono no válido';
		$codigo = '00006';
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

//comprueba que el email tenga el formato correcto
function Comprobar_email(){
	$correcto=true;
	$nombreatributo='email';
	$errores = array();
	if (strlen($this->email)==0){//compruebo que el email no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->email)<3){//compuebo que el email tenga mas de 3 caracteres
		$error = 'Valor de atributo no numérico demasiado corto';
		$codigo = '00003';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (strlen($this->email)>60){//compruebo que no se exceda de 60 caracteres
		$error = 'Valor de atributo demasiado largo';
		$codigo = '00002';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/",$this->email)){//compruebo la expresión regular
		$error = 'Formato email erroneo';
		$codigo = '00120';
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

//comprueba que la fecha tiene el formato desado
function Comprobar_FechaNacimiento(){
	$errores = array();
	$correcto=true;
	$nombreatributo='FechaNacimiento';

	if (strlen($this->FechaNacimiento)==0){//compuebo que la fecha no se vacia
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if (!preg_match("/([1-2][0-9][0-9][0-9])(\/|-)(0[1-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1])$/",$this->FechaNacimiento)){//compuebo que la fecha tenga el formato dd/mm/aaa o dd-mm-aaaa
		$error = 'Formato fecha erróneo';
		$codigo = '00020';
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


//comprueba que el sexo sea hombre o mujer
function Comprobar_sexo(){
	$correcto=true;
	$nombreatributo='sexo';
	$errores = array();
	if (strlen($this->sexo)===0){//compuebo que no sea vacio
		$error = 'Atributo vacío';
		$codigo = '00001';
		array_push($errores,array('nombreatributo' => $nombreatributo,
		'codigoincidencia' => $codigo,
		'mensajeerror' => $error));
		$correcto = false;
	}
	if($this->sexo !='hombre' & $this->sexo !='mujer'){//compruebo que el valor sea hombre o mujer
		$error = "Solo se permiten los valores 'hombre','mujer'";
		$codigo = '00100';
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

	//comprobacion de que el usuario no exista en la BD
		$sql = "select * from USUARIOS where login = '".$this->login."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el usuario
				return 'Inserción fallida: el elemento ya existe';
			}
		//comprobacion de que email y DNI sean unicos.
		$sql = "select * from USUARIOS where email = '".$this->email."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el email
				return 'Inserción fallida: el elemento ya existe';
			}

		$sql = "select * from USUARIOS where DNI = '".$this->DNI."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el DNI
				return 'Inserción fallida: el elemento ya existe';
			}

			
			if (is_uploaded_file($this->fotopersonal['tmp_name'])) {//si esta subida la foto
				$nombreDirectorio = "../Files/"; //almacena el directorio de subida de la foto
				$separar = explode(".", $this->fotopersonal['name']); //almacena un array separando el nombre y la extension de la foto
				$extensionArchivo = $separar[count($separar) - 1]; //almacena la extension del archivo
	
				$nombreFichero = $this->login . "." . $extensionArchivo; //calculamos el nuevo nombre del archivo que sera el login.extension
				move_uploaded_file($this->fotopersonal['tmp_name'], $nombreDirectorio . $nombreFichero); //movemos el archivo al directorio Files
				$foto = $nombreDirectorio . $nombreFichero; //almacenamos en la variable la ruta del archivo
			}

		if($this->fotopersonal['name'] !== ''){
			$sql = "INSERT INTO USUARIOS (
				DNI,
				login,
				password,
				nombre,
				apellidos,
				telefono,
				email,
				FechaNacimiento,
				sexo,
				fotopersonal
				) 
					VALUES (
						'".$this->DNI."',
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->telefono."',
						'".$this->email."',
						'".$this->FechaNacimiento."',
						'".$this->sexo."',
						'".$foto."'
						)";
		}else{
			$sql = "INSERT INTO USUARIOS (
				DNI,
				login,
				password,
				nombre,
				apellidos,
				telefono,
				email,
				FechaNacimiento,
				sexo
				) 
					VALUES (
						'".$this->DNI."',
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->telefono."',
						'".$this->email."',
						'".$this->FechaNacimiento."',
						'".$this->sexo."'
						)";
		}

		if (!$this->mysqli->query($sql)) {
			if (is_uploaded_file($this->fotopersonal['tmp_name'])){
				unlink($foto);//borra la foto en caso de error
			}
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
	error_reporting(0);
	unset($this);
}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{

	$sql = "SELECT *
            FROM USUARIOS
            WHERE 
                login LIKE '%".$this->login."%'
                AND password LIKE '%".$this->password."%'
                AND DNI LIKE '%".$this->DNI."%'
                AND nombre LIKE '%".$this->nombre."%'
                AND apellidos LIKE '%".$this->apellidos."%'
                AND telefono LIKE '%".$this->telefono."%'
                AND email LIKE '%".$this->email."%'
                AND FechaNacimiento LIKE '%".$this->FechaNacimiento."%'
                AND sexo LIKE '%".$this->sexo."%'
				AND fotopersonal LIKE '%".$this->fotopersonal."%'

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
   				USUARIOS
   			WHERE(
   				login = '$this->login'
   			)
   			";

   	if ($this->mysqli->query($sql))
	{
		if(strlen($this->fotopersonal)>0){
			unlink($this->fotopersonal);//elimino la foto del servidor
		}
		
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
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
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

	//comprobacion de que email y DNI sean unicos.
		$sql = "select * from USUARIOS where email = '".$this->email."'  and login not like  '".$this->login."'";	

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el usuario
				return 'Edición fallida: el elemento ya existe';
			}

		$sql = "select * from USUARIOS where DNI = '".$this->DNI."'  and login not like '".$this->login."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el usuario
				return 'Edición fallida: el elemento ya existe';
			}


		if($this->fotopersonal['name'] ==null){//si la foto es null ,actualizo todos los valores excepto la foto
			$sql = "UPDATE USUARIOS
							SET password = '$this->password', DNI = '$this->DNI', nombre = '$this->nombre', apellidos  = '$this->apellidos',telefono = '$this->telefono',email = '$this->email',FechaNacimiento = '$this->FechaNacimiento',sexo = '$this->sexo'
							WHERE ( login = '$this->login' )
						";
			}
		else{
			if (is_uploaded_file($this->fotopersonal['tmp_name'])) {//si esta subida la foto
				$nombreDirectorio = "../Files/"; //almacena el directorio de subida de la foto
				$separar = explode(".", $this->fotopersonal['name']); //almacena un array separando el nombre y la extension de la foto
				$extensionArchivo = $separar[count($separar) - 1]; //almacena la extension del archivo
	
				$nombreFichero = $this->login . "." . $extensionArchivo; //calculamos el nuevo nombre del archivo que sera el login.extension
				move_uploaded_file($this->fotopersonal['tmp_name'], $nombreDirectorio . $nombreFichero); //movemos el archivo al directorio Files
				$foto = $nombreDirectorio . $nombreFichero; //almacenamos en la variable la ruta del archivo
			}
			$sql = "UPDATE USUARIOS
			SET password = '$this->password', DNI = '$this->DNI', nombre = '$this->nombre', apellidos  = '$this->apellidos',telefono = '$this->telefono',email = '$this->email',FechaNacimiento = '$this->FechaNacimiento',sexo = '$this->sexo',fotopersonal= '$foto'
			WHERE ( login = '$this->login' )
			";
			}

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

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	$errores=$this->Comprobar_atributos_login();
	if ($errores !==true){//comprobamos si el array de errores es vacio
		return $errores;
	}

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';//el login introducio no existe en la BD
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';//las password no se corresponde al login
		}
	}
}//fin metodo login

//comrpuebo que el usuario que se está intentado registrar no exista ya en la base de datos
function Register(){

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //TEST : El usuario no existe

	}
	
}
//inserto en la base de datos el nuevo usuario registrado
function registrar(){

	$errores=$this->Comprobar_atributos();
	if ($errores!==	 true){//comprobamos si el array de errores es vacio
		return $errores;
	}

	//comprobacion de que DNI y email sean únicos
	$sql = "select * from USUARIOS where email = '".$this->email."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el email
				return 'Inserción fallida: el elemento ya existe';
			}

		$sql = "select * from USUARIOS where DNI = '".$this->DNI."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operación incorrecta
		}

		if ($result->num_rows == 1){  // existe el dni
				return 'Inserción fallida: el elemento ya existe';
			}

		
			if (is_uploaded_file($this->fotopersonal['tmp_name'])) {//si esta subida la foto
				$nombreDirectorio = "../Files/"; //almacena el directorio de subida de la foto
				$separar = explode(".", $this->fotopersonal['name']); //almacena un array separando el nombre y la extension de la foto
				$extensionArchivo = $separar[count($separar) - 1]; //almacena la extension del archivo
	
				$nombreFichero = $this->login . "." . $extensionArchivo; //calculamos el nuevo nombre del archivo que sera el login.extension
				move_uploaded_file($this->fotopersonal['tmp_name'], $nombreDirectorio . $nombreFichero); //movemos el archivo al directorio Files
				$foto = $nombreDirectorio . $nombreFichero; //almacenamos en la variable la ruta del archivo
			}

		if($this->fotopersonal['name'] !== ''){
			$sql = "INSERT INTO USUARIOS (
				DNI,
				login,
				password,
				nombre,
				apellidos,
				telefono,
				email,
				FechaNacimiento,
				sexo,
				fotopersonal
				) 
					VALUES (
						'".$this->DNI."',
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->telefono."',
						'".$this->email."',
						'".$this->FechaNacimiento."',
						'".$this->sexo."',
						'".$foto."'
						)";
		}else{
			$sql = "INSERT INTO USUARIOS (
				DNI,
				login,
				password,
				nombre,
				apellidos,
				telefono,
				email,
				FechaNacimiento,
				sexo
				) 
					VALUES (
						'".$this->DNI."',
						'".$this->login."',
						'".$this->password."',
						'".$this->nombre."',
						'".$this->apellidos."',
						'".$this->telefono."',
						'".$this->email."',
						'".$this->FechaNacimiento."',
						'".$this->sexo."'
						)";
		}
								
		if (!$this->mysqli->query($sql)) {
			if (is_uploaded_file($this->fotopersonal['tmp_name'])){
				unlink($foto);//borra la foto en caso de error
			}
			return 'Error de gestor de base de datos';//operación incorrecta
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 