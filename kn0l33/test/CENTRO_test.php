<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad CENTRO

include '../Model/CENTRO_Model.php';
		
//comprobacion del metodo add
function CENTRO_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $CENTRO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $CENTRO_array_test1['entidad'] = 'CENTRO';	
        $CENTRO_array_test1['metodo'] = 'ADD';
        $CENTRO_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $CENTRO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $CENTRO_array_test1['error_obtenido'] = '';
        $CENTRO_array_test1['resultado'] = '';

        $CODCENTRO="aaaa";
        $CODEDIFICIO="aaaa";
        $NOMBRECENTRO="aaaa";
        $DIRECCIONCENTRO="aaaa";
        $RESPONSABLECENTRO="aaaa";

        $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
        $centro->ADD();

        $CENTRO_array_test1['error_obtenido'] = $centro->ADD();
        if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
        {
            $CENTRO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $CENTRO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $CENTRO_array_test1);
    
        $centro->DELETE();

        // Comprobar que se inserta correctamente
        $CENTRO_array_test1['entidad'] = 'CENTRO';	
        $CENTRO_array_test1['metodo'] = 'ADD';
        $CENTRO_array_test1['error'] = 'Inserción realizada con éxito';
        $CENTRO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $CENTRO_array_test1['error_obtenido'] = '';
        $CENTRO_array_test1['resultado'] = '';

        $CODCENTRO="aaaa";
        $CODEDIFICIO="aaaa";
        $NOMBRECENTRO="aaaa";
        $DIRECCIONCENTRO="aaaa";
        $RESPONSABLECENTRO="aaaa";

        $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
       

        $CENTRO_array_test1['error_obtenido'] = $centro->ADD();
        if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
        {
            $CENTRO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $CENTRO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $CENTRO_array_test1);
    
        $centro->DELETE();
}

//comprobacion del metodo edit
function CENTRO_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $CENTRO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $CENTRO_array_test1['entidad'] = 'CENTRO';	
        $CENTRO_array_test1['metodo'] = 'EDIT';
        $CENTRO_array_test1['error'] = 'Actualización realizada con éxito';
        $CENTRO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $CENTRO_array_test1['error_obtenido'] = '';
        $CENTRO_array_test1['resultado'] = '';

        $CODCENTRO="aaaa";
        $CODEDIFICIO="aaaa";
        $NOMBRECENTRO="aaaa";
        $DIRECCIONCENTRO="aaaa";
        $RESPONSABLECENTRO="aaaa";

        $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
      

        $CENTRO_array_test1['error_obtenido'] = $centro->EDIT();
        if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
        {
            $CENTRO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $CENTRO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $CENTRO_array_test1);
    
        $centro->DELETE();

        
}

//comprobacion del metodo SEARCH
function CENTRO_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $CENTRO_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $CENTRO_array_test1['entidad'] = 'CENTRO';	
        $CENTRO_array_test1['metodo'] = 'SEARCH';
        $CENTRO_array_test1['error'] = 'Devuelve el recordset';
        $CENTRO_array_test1['error_esperado'] = 'object';
        $CENTRO_array_test1['error_obtenido'] = '';
        $CENTRO_array_test1['resultado'] = '';

        $CODCENTRO="aaaa";
        $CODEDIFICIO="aaaa";
        $NOMBRECENTRO="aaaa";
        $DIRECCIONCENTRO="aaaa";
        $RESPONSABLECENTRO="aaaa";

        $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
        $centro->ADD();

                                                           


        $CENTRO_array_test1['error_obtenido'] = gettype($centro->SEARCH());
        if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
        {
            $CENTRO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $CENTRO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $CENTRO_array_test1);
    
        $centro->DELETE();


        //error de gestor de bd

        $CENTRO_array_test1['entidad'] = 'CENTRO';	
        $CENTRO_array_test1['metodo'] = 'SEARCH';
        $CENTRO_array_test1['error'] = 'Error de gestor de base de datos';
        $CENTRO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $CENTRO_array_test1['error_obtenido'] = '';
        $CENTRO_array_test1['resultado'] = '';

        $CODCENTRO="aaaa";
        $CODEDIFICIO="aaaa";
        $NOMBRECENTRO="aaaa";
        $DIRECCIONCENTRO="aaaa";
        $RESPONSABLECENTRO='javi\' ,\'kdfalkj';

        $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
      

        $CENTRO_array_test1['error_obtenido'] = $centro->SEARCH();
        if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
        {
            $CENTRO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $CENTRO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $CENTRO_array_test1);
    
        $centro->DELETE();
}




//comprobacion del metodo DELETE
function CENTRO_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $CENTRO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $CENTRO_array_test1['entidad'] = 'CENTRO';	
        $CENTRO_array_test1['metodo'] = 'DELETE';
        $CENTRO_array_test1['error'] = 'Borrado realizado con éxito';
        $CENTRO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $CENTRO_array_test1['error_obtenido'] = '';
        $CENTRO_array_test1['resultado'] = '';

        $CODCENTRO="aaaa";
        $CODEDIFICIO="aaaa";
        $NOMBRECENTRO="aaaa";
        $DIRECCIONCENTRO="aaaa";
        $RESPONSABLECENTRO="aaaa";

        $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
        $centro->ADD();

        $CENTRO_array_test1['error_obtenido'] = $centro->DELETE();
        if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
        {
            $CENTRO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $CENTRO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $CENTRO_array_test1);
    
        

        
}

//funcion para comprobar el rellenar datos
function CENTRO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$CENTRO_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RellenaDatos';
	$CENTRO_array_test1['error'] = 'Devuelve el recordset';
	$CENTRO_array_test1['error_esperado'] = 'array';
	$CENTRO_array_test1['error_obtenido'] = '';
	$CENTRO_array_test1['resultado'] = '';
	
    $CODCENTRO="aaaa";
    $CODEDIFICIO="aaaa";
    $NOMBRECENTRO="aaaa";
    $DIRECCIONCENTRO="aaaa";
    $RESPONSABLECENTRO="aaaa";

    $centro = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
	$centro->ADD();

	$CENTRO_array_test1['error_obtenido'] = gettype($centro->RellenaDatos());
	if ($CENTRO_array_test1['error_obtenido'] === $CENTRO_array_test1['error_esperado'])
	{
		$CENTRO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$CENTRO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $CENTRO_array_test1);

	$centro->DELETE();

}


CENTRO_ADD_test();
CENTRO_EDIT_test();
CENTRO_SEARCH_test();
CENTRO_DELETE_test();
CENTRO_RellenaDatos_test();
?>