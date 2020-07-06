<?php
//Clase : TITULACION_Model
//Creado el : 10/10/2019
//Creado por: z3oc9j
//Función: realiza las operaciones de titulación
//-------------------------------------------------------

class TITULACION_Model {


	//declaracion de variables
	var $CODTITULACION; //almacena el código de titulación	
	var $CODCENTRO; //almacena el código del centro donde se imparte
	var $NOMBRETITULACION; //almacena el nombre de la titulación
	var $RESPONSABLETITULACION; //almacena el nombre del responsable

//Constructor de la clase
//

function __construct($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION){


	$this->CODTITULACION = $CODTITULACION;
	$this->CODCENTRO= $CODCENTRO;
	$this->NOMBRETITULACION = $NOMBRETITULACION;
	$this->RESPONSABLETITULACION = $RESPONSABLETITULACION;
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
	//compruebo que no existe la titulacion que yo quiero añadir
		$sql = "select * from TITULACION where CODTITULACION = '".$this->CODTITULACION."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}

		if ($result->num_rows == 1){  // existe la titulacion
				return 'Inserción fallida: el elemento ya existe';
			}


		$sql = "INSERT INTO TITULACION (
			
			CODTITULACION,
			CODCENTRO,
			NOMBRETITULACION,
			RESPONSABLETITULACION
			) 
				VALUES (
					
					'".$this->CODTITULACION."',
					'".$this->CODCENTRO."',
					'".$this->NOMBRETITULACION."',
					'".$this->RESPONSABLETITULACION."'
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
            FROM TITULACION
            WHERE 
                CODTITULACION LIKE '%".$this->CODTITULACION."%'
                AND CODCENTRO LIKE '%".$this->CODCENTRO."%'
                AND NOMBRETITULACION LIKE '%".$this->NOMBRETITULACION."%'
                AND RESPONSABLETITULACION LIKE '%".$this->RESPONSABLETITULACION."%'
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
	//comprobacion de que no se tenga asociado un PROF_TITULACION
   $sql = "select * from PROF_TITULACION where CODTITULACION = '".$this->CODTITULACION."'";

		if (!$result = $this->mysqli->query($sql))
		{
			return 'Error de gestor de base de datos';//operacion incorrecta
		}
		if ($result->num_rows >0){  // existe al menos una tupla
				return 'No se puede eliminar: hay un profesor impartiendo este titulo';
			}

   $sql = "	DELETE FROM 
   				TITULACION
   			WHERE(
   				CODTITULACION = '$this->CODTITULACION'
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
			FROM TITULACION
			WHERE (
				(CODTITULACION = '$this->CODTITULACION') 
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
	$sql = "UPDATE TITULACION
                    SET  CODCENTRO = '$this->CODCENTRO', NOMBRETITULACION = '$this->NOMBRETITULACION', RESPONSABLETITULACION  = '$this->RESPONSABLETITULACION'
                    WHERE ( CODTITULACION = '$this->CODTITULACION' )
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