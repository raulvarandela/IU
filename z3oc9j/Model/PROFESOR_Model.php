<?php

//Clase : PROFESOR_Model
//Creado el : 10/10/2019
//Creado por: z3oc9j
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