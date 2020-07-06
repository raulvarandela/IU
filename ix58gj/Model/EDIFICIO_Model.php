<?php

//Clase : EDIFICIO_Model
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------

class EDIFICIO_Model {


	//declaracion de variables
	var $CODEDIFICIO;
	var $NOMBREEDIFICIO;
	var $DIRECCIONEDIFICIO;
	var $CAMPUSEDIFICIO;

//Constructor de la clase
//

function __construct($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO){


	$this->CODEDIFICIO = $CODEDIFICIO;
	$this->NOMBREEDIFICIO= $NOMBREEDIFICIO;
	$this->DIRECCIONEDIFICIO = $DIRECCIONEDIFICIO;
	$this->CAMPUSEDIFICIO = $CAMPUSEDIFICIO;
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