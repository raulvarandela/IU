<?php
//Clase : USUARIOS_Model
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------

class USUARIOS_Model {

//declaracion de variables
	var $login;
	var $password;
	var $DNI;
	var $nombre;
	var $apellidos;
	var $telefono;
	var $email;
	var $FechaNacimiento;
	var $sexo;
	var $mysqli;

//Constructor de la clase
//

function __construct($login,$password,$DNI,$nombre,$apellidos,$telefono,$email,$FechaNacimiento,$sexo){

	$this->login = $login;
	$this->password = $password;
	$this->DNI= $DNI;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->telefono= $telefono;
	$this->email = $email;
	$this->FechaNacimiento= $FechaNacimiento;
	$this->sexo= $sexo;
	$this->erroresdatos = array();
	//$this->Comprobar_atributos();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

// function Comprobar_atributos
// si todas las funciones de comprobacion de atributos individuales son true devuelve true
// si alguna es false, devuelve el array de errores de datos
function Comprobar_atributos()
{
	if ($this->Comprobar_login &
		$this->Comprobar_nombre)
	{
		return true;
	}
	else
		{
			return $this->erroresdatos;
		}
}

// function Comprobar_login()
// Comprueba el formato del login 
//	alfanumerico
//	mayor o igual a 5
// 	menor o igual a 15
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_login()
{
	if (!preg_match("^([a-zA-Z][0-9]){5,15}^",$this->login)){
		$error = 'Error en login: ';
		array_push($this->erroresdatos, $error);
		return false;
	}
	else
	{
		return true;
	}
}

// function Comprobar_login()
// Comprueba el formato del login 
//	alfanumerico
//	mayor o igual a 5
// 	menor o igual a 15
//	no vacio
// devuelve un true o un false y rellena en caso de error el array de errores de datos
function Comprobar_nombre()
{
	$correcto = true;

	if (strlen($this->nombre)<3)
	{
		$error = 'Error en nombre: longitud menor que 3';
		array_push($this->erroresdatos, $error);
		$correcto = false;
	}
	if (strlen($this->nombre)>30)
	{
		$error = 'Error en nombre: longitud mayor de 30';
		array_push($this->erroresdatos, $error);
		$correcto = false;
	}
	if (!preg_match("^([a-zA-Z])^",$this->nombre)){
		$error = 'Error en nombre: Solo se admiten alfabéticos';
		array_push($this->erroresdatos, $error);
		$correcto = false;
	}
	
	return $correcto;
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
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

	$sql = "UPDATE USUARIOS
                    SET password = '$this->password', DNI = '$this->DNI', nombre = '$this->nombre', apellidos  = '$this->apellidos',telefono = '$this->telefono',email = '$this->email',FechaNacimiento = '$this->FechaNacimiento',sexo = '$this->sexo'
                    WHERE ( login = '$this->login' )
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

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

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
			return 'La password para este usuario no es correcta';//las passwoed no se corresponde al login
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
								
		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';//operación incorrecta
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 