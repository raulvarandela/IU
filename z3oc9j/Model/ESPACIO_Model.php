<?php

//Clase : ESPACIO_Model
//Creado el : 10/10/2019
//Creado por: z3oc9j
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

//Constructor de la clase
//

function __construct($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO){

	$this->CODESPACIO = $CODESPACIO;
	$this->CODEDIFICIO = $CODEDIFICIO;
	$this->CODCENTRO= $CODCENTRO;
	$this->TIPO = $TIPO;
	$this->SUPERFICIEESPACIO = $SUPERFICIEESPACIO;
	$this->NUMINVENTARIOESPACIO=$NUMINVENTARIOESPACIO;
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