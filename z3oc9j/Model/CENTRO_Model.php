<?php

//Clase : CENTRO_Model
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: realiza todas las operaciones de centro
//-------------------------------------------------------

class CENTRO_Model {

//declaro las variables que corresponden a los atributos de la base de datos
	var $CODCENTRO; //almacena el código de centro
	var $CODEDIFICIO; //almacena el código de edificio
	var $NOMBRECENTRO; //almacena el nombre del centro
	var $DIRECCIONCENTRO;//almacena la dirección del centro
	var $RESPONSABLECENTRO;//almacena el nombre del responsable del centro

//Constructor de la clase
//

function __construct($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO){

	$this->CODCENTRO = $CODCENTRO;
	$this->CODEDIFICIO = $CODEDIFICIO;
	$this->NOMBRECENTRO= $NOMBRECENTRO;
	$this->DIRECCIONCENTRO = $DIRECCIONCENTRO;
	$this->RESPONSABLECENTRO = $RESPONSABLECENTRO;
	$this->erroresdatos = array();

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}


//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{
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