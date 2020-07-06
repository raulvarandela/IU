<?php
//Clase : PROF_TITULACION_Model
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: realiza las operaciones de las titulaciones asignados a profesores
//-------------------------------------------------------

class PROF_TITULACION_Model {

	//declaracion de variables
	var $DNI; //alacena el DNI del profesor
	var $CODTITULACION; //almacena el código de la titulación
	var $ANHOACADEMICO; //alacena el año académico
	var $mysqli; //alamacena la conexión con la base de datos

//Constructor de la clase
//

function __construct($DNI,$CODTITULACION,$ANHOACADEMICO){

	
	$this->DNI= $DNI;
	$this->CODTITULACION = $CODTITULACION;
	$this->ANHOACADEMICO= $ANHOACADEMICO;

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
	//comprobacion de que no existe PROF_TITULACION en la BD
		$sql = "select * from PROF_TITULACION where DNI = '".$this->DNI."' AND CODTITULACION = '".$this->CODTITULACION."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows == 1){  // existe el PROF_TITULACION
				return 'Inserción fallida: el elemento ya existe';
			}



		$sql = "INSERT INTO PROF_TITULACION (
			DNI,
			CODTITULACION,
			ANHOACADEMICO
			) 
				VALUES (
					'".$this->DNI."',
					'".$this->CODTITULACION."',
					'".$this->ANHOACADEMICO."'
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
            FROM PROF_TITULACION
            WHERE 
                DNI LIKE '%".$this->DNI."%'
                AND CODTITULACION LIKE '%".$this->CODTITULACION."%'
                 AND ANHOACADEMICO LIKE '%".$this->ANHOACADEMICO."%'
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
   $sql = "	DELETE FROM 
   				PROF_TITULACION
   			WHERE(
   				DNI = '$this->DNI' AND CODTITULACION = '$this->CODTITULACION'
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
			FROM PROF_TITULACION
			WHERE 
				(DNI = '$this->DNI' AND CODTITULACION = '$this->CODTITULACION')
			";

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

	$sql = "UPDATE PROF_TITULACION
                    SET  ANHOACADEMICO = '$this->ANHOACADEMICO'
                    WHERE ( DNI = '$this->DNI' AND CODTITULACION = '$this->CODTITULACION')
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