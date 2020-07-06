<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_TITULACION

include '../Model/PROF_TITULACION_Model.php';


//comprobacion del metodo add
function PROF_TITULACION_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_TITULACION_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'ADD';
        $PROF_TITULACION_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $PROF_TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $PROF_TITULACION_array_test1['error_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';

        $DNI="96925636W";
        $CODTITULACION = "asddf";
        $ANHOACADEMICO = "2019-2020";

        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);
        $PROF_TITULACION->ADD();

        $PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->ADD();
        if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
        {
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
        $PROF_TITULACION->DELETE();

        // Comprobar que se inserta correctamente
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'ADD';
        $PROF_TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
        $PROF_TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $PROF_TITULACION_array_test1['error_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';


        $DNI="96925636W";
        $CODTITULACION = "asddf";
        $ANHOACADEMICO = "2019-2020";

        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);
       

        $PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->ADD();
        if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
        {
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
        $PROF_TITULACION->DELETE();
}

//comprobacion del metodo edit
function PROF_TITULACION_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_TITULACION_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'EDIT';
        $PROF_TITULACION_array_test1['error'] = 'Actualización realizada con éxito';
        $PROF_TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $PROF_TITULACION_array_test1['error_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';

       
        $DNI="96925636W";
        $CODTITULACION = "asddf";
        $ANHOACADEMICO = "2019-2020";

        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);

        $PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->EDIT();
        if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
        {
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
        $PROF_TITULACION->DELETE();

        
}


//comprobacion del metodo SEARCH
function PROF_TITULACION_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_TITULACION_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
        $PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
        $PROF_TITULACION_array_test1['error_esperado'] = 'object';
        $PROF_TITULACION_array_test1['error_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';

        $DNI="96925636W";
        $CODTITULACION = "asddf";
        $ANHOACADEMICO = "2019-2020";

        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);

        $PROF_TITULACION->ADD();

                                                           


        $PROF_TITULACION_array_test1['error_obtenido'] = gettype($PROF_TITULACION->SEARCH());
        if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
        {
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
        $PROF_TITULACION->DELETE();


        //error de gestor de bd

        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'SEARCH';
        $PROF_TITULACION_array_test1['error'] = 'Error de gestor de base de datos';
        $PROF_TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $PROF_TITULACION_array_test1['error_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';


        $DNI="96925636W";
        $CODTITULACION = 'javi\' ,\'kdfalkj';
        $ANHOACADEMICO = "2019-2020";

        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);

   


        $PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->SEARCH();
        if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
        {
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
        $PROF_TITULACION->DELETE();
}

//comprobacion del metodo DELETE
function PROF_TITULACION_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_TITULACION_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'DELETE';
        $PROF_TITULACION_array_test1['error'] = 'Borrado realizado con éxito';
        $PROF_TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $PROF_TITULACION_array_test1['error_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';

        $DNI="96925636W";
        $CODTITULACION = "asddf";
        $ANHOACADEMICO = "2019-2020";

        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);

        $PROF_TITULACION->ADD();

        $PROF_TITULACION_array_test1['error_obtenido'] = $PROF_TITULACION->DELETE();
        if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
        {
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);
    
        

        
}


//funcion para comprobar el rellenar datos
function PROF_TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_TITULACION_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$PROF_TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$PROF_TITULACION_array_test1['error_esperado'] = 'array';
	$PROF_TITULACION_array_test1['error_obtenido'] = '';
	$PROF_TITULACION_array_test1['resultado'] = '';
	
 
    $DNI="96925636W";
    $CODTITULACION = "asddf";
    $ANHOACADEMICO = "2019-2020";

    $PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);

	$PROF_TITULACION->ADD();

	$PROF_TITULACION_array_test1['error_obtenido'] = gettype($PROF_TITULACION->RellenaDatos());
	if ($PROF_TITULACION_array_test1['error_obtenido'] === $PROF_TITULACION_array_test1['error_esperado'])
	{
		$PROF_TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_TITULACION_array_test1);

	$PROF_TITULACION->DELETE();

}



PROF_TITULACION_ADD_test();
PROF_TITULACION_EDIT_test();
PROF_TITULACION_SEARCH_test();
PROF_TITULACION_DELETE_test();
PROF_TITULACION_RellenaDatos_test();
?>