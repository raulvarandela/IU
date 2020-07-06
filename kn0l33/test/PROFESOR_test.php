<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROFESOR

include '../Model/PROFESOR_Model.php';


//comprobacion del metodo add
function PROFESOR_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'ADD';
        $PROFESOR_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $PROFESOR_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $PROFESOR_array_test1['error_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';

        $DNI="96925636W";
        $NOMBREPROFESOR="aaaaaaa";
        $APELLIDOSPROFESOR="aaaaaaa";
        $AREAPROFESOR="aaaaaaa";
        $DEPARTAMENTOPROFESOR="aaaaaaa";

        $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);
        $PROFESOR->ADD();

        $PROFESOR_array_test1['error_obtenido'] = $PROFESOR->ADD();
        if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
        {
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROFESOR_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
        $PROFESOR->DELETE();

        // Comprobar que se inserta correctamente
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'ADD';
        $PROFESOR_array_test1['error'] = 'Inserción realizada con éxito';
        $PROFESOR_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $PROFESOR_array_test1['error_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';


        $DNI="96925636W";
        $NOMBREPROFESOR="aaaaaaa";
        $APELLIDOSPROFESOR="aaaaaaa";
        $AREAPROFESOR="aaaaaaa";
        $DEPARTAMENTOPROFESOR="aaaaaaa";

        $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);
       

        $PROFESOR_array_test1['error_obtenido'] = $PROFESOR->ADD();
        if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
        {
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROFESOR_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
        $PROFESOR->DELETE();
}

//comprobacion del metodo edit
function PROFESOR_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'EDIT';
        $PROFESOR_array_test1['error'] = 'Actualización realizada con éxito';
        $PROFESOR_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $PROFESOR_array_test1['error_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';

        $DNI="96925636W";
        $NOMBREPROFESOR="aaaaaaa";
        $APELLIDOSPROFESOR="aaaaaaa";
        $AREAPROFESOR="aaaaaaa";
        $DEPARTAMENTOPROFESOR="aaaaaaa";

        $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);

        $PROFESOR_array_test1['error_obtenido'] = $PROFESOR->EDIT();
        if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
        {
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROFESOR_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
        $PROFESOR->DELETE();

        
}


//comprobacion del metodo SEARCH
function PROFESOR_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'SEARCH';
        $PROFESOR_array_test1['error'] = 'Devuelve el recordset';
        $PROFESOR_array_test1['error_esperado'] = 'object';
        $PROFESOR_array_test1['error_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';

        $DNI="96925636W";
        $NOMBREPROFESOR="aaaaaaa";
        $APELLIDOSPROFESOR="aaaaaaa";
        $AREAPROFESOR="aaaaaaa";
        $DEPARTAMENTOPROFESOR="aaaaaaa";

        $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);

        $PROFESOR->ADD();

                                                           


        $PROFESOR_array_test1['error_obtenido'] = gettype($PROFESOR->SEARCH());
        if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
        {
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROFESOR_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
        $PROFESOR->DELETE();


        //error de gestor de bd

        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'SEARCH';
        $PROFESOR_array_test1['error'] = 'Error de gestor de base de datos';
        $PROFESOR_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $PROFESOR_array_test1['error_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';


         
        $DNI="96925636W";
        $NOMBREPROFESOR='javi\' ,\'kdfalkj';
        $APELLIDOSPROFESOR="aaaaaaa";
        $AREAPROFESOR="aaaaaaa";
        $DEPARTAMENTOPROFESOR="aaaaaaa";

        $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);

   


        $PROFESOR_array_test1['error_obtenido'] = $PROFESOR->SEARCH();
        if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
        {
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROFESOR_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
        $PROFESOR->DELETE();
}

//comprobacion del metodo DELETE
function PROFESOR_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DELETE';
        $PROFESOR_array_test1['error'] = 'Borrado realizado con éxito';
        $PROFESOR_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $PROFESOR_array_test1['error_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';

        $DNI="96925636W";
        $NOMBREPROFESOR="aaaaaaa";
        $APELLIDOSPROFESOR="aaaaaaa";
        $AREAPROFESOR="aaaaaaa";
        $DEPARTAMENTOPROFESOR="aaaaaaa";

        $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);

        $PROFESOR->ADD();

        $PROFESOR_array_test1['error_obtenido'] = $PROFESOR->DELETE();
        if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
        {
            $PROFESOR_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROFESOR_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROFESOR_array_test1);
    
        

        
}


//funcion para comprobar el rellenar datos
function PROFESOR_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROFESOR_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$PROFESOR_array_test1['entidad'] = 'PROFESOR';	
	$PROFESOR_array_test1['metodo'] = 'RellenaDatos';
	$PROFESOR_array_test1['error'] = 'Devuelve el recordset';
	$PROFESOR_array_test1['error_esperado'] = 'array';
	$PROFESOR_array_test1['error_obtenido'] = '';
	$PROFESOR_array_test1['resultado'] = '';
	
    $DNI="96925636W";
    $NOMBREPROFESOR="aaaaaaa";
    $APELLIDOSPROFESOR="aaaaaaa";
    $AREAPROFESOR="aaaaaaa";
    $DEPARTAMENTOPROFESOR="aaaaaaa";

    $PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);

	$PROFESOR->ADD();

	$PROFESOR_array_test1['error_obtenido'] = gettype($PROFESOR->RellenaDatos());
	if ($PROFESOR_array_test1['error_obtenido'] === $PROFESOR_array_test1['error_esperado'])
	{
		$PROFESOR_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROFESOR_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROFESOR_array_test1);

	$PROFESOR->DELETE();

}



PROFESOR_ADD_test();
PROFESOR_EDIT_test();
PROFESOR_SEARCH_test();
PROFESOR_DELETE_test();
PROFESOR_RellenaDatos_test();
?>