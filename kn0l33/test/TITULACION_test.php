<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad TITULACION

include '../Model/TITULACION_Model.php';


//comprobacion del metodo add
function TITULACION_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $TITULACION_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'ADD';
        $TITULACION_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $TITULACION_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $TITULACION_array_test1['error_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';

        $CODTITULACION="aaaaa";
        $CODCENTRO="aaaaa";
        $NOMBRETITULACION="aaaaa";
        $RESPONSABLETITULACION="aaaaa";

        $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
        $TITULACION->ADD();

        $TITULACION_array_test1['error_obtenido'] = $TITULACION->ADD();
        if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
        {
            $TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $TITULACION_array_test1);
    
        $TITULACION->DELETE();

        // Comprobar que se inserta correctamente
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'ADD';
        $TITULACION_array_test1['error'] = 'Inserción realizada con éxito';
        $TITULACION_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $TITULACION_array_test1['error_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';


        $CODTITULACION="aaaaa";
        $CODCENTRO="aaaaa";
        $NOMBRETITULACION="aaaaa";
        $RESPONSABLETITULACION="aaaaa";

        $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
       

        $TITULACION_array_test1['error_obtenido'] = $TITULACION->ADD();
        if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
        {
            $TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $TITULACION_array_test1);
    
        $TITULACION->DELETE();
}

//comprobacion del metodo edit
function TITULACION_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $TITULACION_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'EDIT';
        $TITULACION_array_test1['error'] = 'Actualización realizada con éxito';
        $TITULACION_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $TITULACION_array_test1['error_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';

        $CODTITULACION="aaaaa";
        $CODCENTRO="aaaaa";
        $NOMBRETITULACION="aaaaa";
        $RESPONSABLETITULACION="aaaaa";

        $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);

        $TITULACION_array_test1['error_obtenido'] = $TITULACION->EDIT();
        if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
        {
            $TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $TITULACION_array_test1);
    
        $TITULACION->DELETE();

        
}


//comprobacion del metodo SEARCH
function TITULACION_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $TITULACION_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'SEARCH';
        $TITULACION_array_test1['error'] = 'Devuelve el recordset';
        $TITULACION_array_test1['error_esperado'] = 'object';
        $TITULACION_array_test1['error_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';

        $CODTITULACION="aaaaa";
        $CODCENTRO="aaaaa";
        $NOMBRETITULACION="aaaaa";
        $RESPONSABLETITULACION="aaaaa";

        $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);

        $TITULACION->ADD();

                                                           


        $TITULACION_array_test1['error_obtenido'] = gettype($TITULACION->SEARCH());
        if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
        {
            $TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $TITULACION_array_test1);
    
        $TITULACION->DELETE();


        //error de gestor de bd

        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'SEARCH';
        $TITULACION_array_test1['error'] = 'Error de gestor de base de datos';
        $TITULACION_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $TITULACION_array_test1['error_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';


         
        $CODTITULACION="aaaaa";
        $CODCENTRO="aaaaa";
        $NOMBRETITULACION="aaaaa";
        $RESPONSABLETITULACION='javi\' ,\'kdfalkj';

        $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);

   


        $TITULACION_array_test1['error_obtenido'] = $TITULACION->SEARCH();
        if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
        {
            $TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $TITULACION_array_test1);
    
        $TITULACION->DELETE();
}

//comprobacion del metodo DELETE
function TITULACION_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $TITULACION_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'DELETE';
        $TITULACION_array_test1['error'] = 'Borrado realizado con éxito';
        $TITULACION_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $TITULACION_array_test1['error_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';

        $CODTITULACION="aaaaa";
        $CODCENTRO="aaaaa";
        $NOMBRETITULACION="aaaaa";
        $RESPONSABLETITULACION="aaaaa";

        $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);

        $TITULACION->ADD();

        $TITULACION_array_test1['error_obtenido'] = $TITULACION->DELETE();
        if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
        {
            $TITULACION_array_test1['resultado'] = 'OK';
        }
        else
        {
            $TITULACION_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $TITULACION_array_test1);
    
        

        
}


//funcion para comprobar el rellenar datos
function TITULACION_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$TITULACION_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'RellenaDatos';
	$TITULACION_array_test1['error'] = 'Devuelve el recordset';
	$TITULACION_array_test1['error_esperado'] = 'array';
	$TITULACION_array_test1['error_obtenido'] = '';
	$TITULACION_array_test1['resultado'] = '';
	
    $CODTITULACION="aaaaa";
    $CODCENTRO="aaaaa";
    $NOMBRETITULACION="aaaaa";
    $RESPONSABLETITULACION="aaaaa";

    $TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);

	$TITULACION->ADD();

	$TITULACION_array_test1['error_obtenido'] = gettype($TITULACION->RellenaDatos());
	if ($TITULACION_array_test1['error_obtenido'] === $TITULACION_array_test1['error_esperado'])
	{
		$TITULACION_array_test1['resultado'] = 'OK';
	}
	else
	{
		$TITULACION_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $TITULACION_array_test1);

	$TITULACION->DELETE();

}



TITULACION_ADD_test();
TITULACION_EDIT_test();
TITULACION_SEARCH_test();
TITULACION_DELETE_test();
TITULACION_RellenaDatos_test();
?>