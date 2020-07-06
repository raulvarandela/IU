<?php

//Clase : PROF_ESPACIO_Model
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------

class PROF_ESPACIO_Model {

	//declaracion de variables
	var $DNI;
	var $CODESPACIO;
	var $mysqli;

//Constructor de la clase
//

function __construct($DNI,$CODESPACIO){

	
	$this->DNI= $DNI;
	$this->CODESPACIO = $CODESPACIO;

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