<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad EDIFICIO

include '../Model/EDIFICIO_Model.php';


//comprobacion del metodo add
function EDIFICIO_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $EDIFICIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
        $EDIFICIO_array_test1['metodo'] = 'ADD';
        $EDIFICIO_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $EDIFICIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $EDIFICIO_array_test1['error_obtenido'] = '';
        $EDIFICIO_array_test1['resultado'] = '';

       
        $CODEDIFICIO="aaaa";
        $NOMBREEDIFICIO="aaaa";
        $DIRECCIONEDIFICIO="aaaa";
        $CAMPUSEDIFICIO="aaaa";

        $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
        $EDIFICIO->ADD();

        $EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->ADD();
        if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
        {
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
        $EDIFICIO->DELETE();

        // Comprobar que se inserta correctamente
        $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
        $EDIFICIO_array_test1['metodo'] = 'ADD';
        $EDIFICIO_array_test1['error'] = 'Inserción realizada con éxito';
        $EDIFICIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $EDIFICIO_array_test1['error_obtenido'] = '';
        $EDIFICIO_array_test1['resultado'] = '';

        $CODEDIFICIO="aaaa";
        $NOMBREEDIFICIO="aaaa";
        $DIRECCIONEDIFICIO="aaaa";
        $CAMPUSEDIFICIO="aaaa";

        $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
       

        $EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->ADD();
        if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
        {
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
        $EDIFICIO->DELETE();
}

//comprobacion del metodo edit
function EDIFICIO_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $EDIFICIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
        $EDIFICIO_array_test1['metodo'] = 'EDIT';
        $EDIFICIO_array_test1['error'] = 'Actualización realizada con éxito';
        $EDIFICIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $EDIFICIO_array_test1['error_obtenido'] = '';
        $EDIFICIO_array_test1['resultado'] = '';

        $CODEDIFICIO="aaaa";
        $NOMBREEDIFICIO="aaaa";
        $DIRECCIONEDIFICIO="aaaa";
        $CAMPUSEDIFICIO="aaaa";

        $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
      

        $EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->EDIT();
        if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
        {
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
        $EDIFICIO->DELETE();

        
}


//comprobacion del metodo SEARCH
function EDIFICIO_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $EDIFICIO_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
        $EDIFICIO_array_test1['metodo'] = 'SEARCH';
        $EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
        $EDIFICIO_array_test1['error_esperado'] = 'object';
        $EDIFICIO_array_test1['error_obtenido'] = '';
        $EDIFICIO_array_test1['resultado'] = '';

        $CODEDIFICIO="aaaa";
        $NOMBREEDIFICIO="aaaa";
        $DIRECCIONEDIFICIO="aaaa";
        $CAMPUSEDIFICIO="aaaa";

        $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
        $EDIFICIO->ADD();

                                                           


        $EDIFICIO_array_test1['error_obtenido'] = gettype($EDIFICIO->SEARCH());
        if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
        {
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
        $EDIFICIO->DELETE();


        //error de gestor de bd

        $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
        $EDIFICIO_array_test1['metodo'] = 'SEARCH';
        $EDIFICIO_array_test1['error'] = 'Error de gestor de base de datos';
        $EDIFICIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $EDIFICIO_array_test1['error_obtenido'] = '';
        $EDIFICIO_array_test1['resultado'] = '';



        $CODEDIFICIO="aaaa";
        $NOMBREEDIFICIO="aaaa";
        $DIRECCIONEDIFICIO="aaaa";
        $CAMPUSEDIFICIO='javi\' ,\'kdfalkj';

        $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);

        $EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->SEARCH();
        if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
        {
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
        $EDIFICIO->DELETE();
}

//comprobacion del metodo DELETE
function EDIFICIO_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $EDIFICIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
        $EDIFICIO_array_test1['metodo'] = 'DELETE';
        $EDIFICIO_array_test1['error'] = 'Borrado realizado con éxito';
        $EDIFICIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $EDIFICIO_array_test1['error_obtenido'] = '';
        $EDIFICIO_array_test1['resultado'] = '';

        $CODEDIFICIO="aaaa";
        $NOMBREEDIFICIO="aaaa";
        $DIRECCIONEDIFICIO="aaaa";
        $CAMPUSEDIFICIO="aaaa";

        $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
        $EDIFICIO->ADD();

        $EDIFICIO_array_test1['error_obtenido'] = $EDIFICIO->DELETE();
        if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
        {
            $EDIFICIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $EDIFICIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $EDIFICIO_array_test1);
    
        

        
}


//funcion para comprobar el rellenar datos
function EDIFICIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$EDIFICIO_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'RellenaDatos';
	$EDIFICIO_array_test1['error'] = 'Devuelve el recordset';
	$EDIFICIO_array_test1['error_esperado'] = 'array';
	$EDIFICIO_array_test1['error_obtenido'] = '';
	$EDIFICIO_array_test1['resultado'] = '';
	
    $CODEDIFICIO="aaaa";
    $NOMBREEDIFICIO="aaaa";
    $DIRECCIONEDIFICIO="aaaa";
    $CAMPUSEDIFICIO="aaaa";

    $EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
	$EDIFICIO->ADD();

	$EDIFICIO_array_test1['error_obtenido'] = gettype($EDIFICIO->RellenaDatos());
	if ($EDIFICIO_array_test1['error_obtenido'] === $EDIFICIO_array_test1['error_esperado'])
	{
		$EDIFICIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$EDIFICIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $EDIFICIO_array_test1);

	$EDIFICIO->DELETE();

}



EDIFICIO_ADD_test();
EDIFICIO_EDIT_test();
EDIFICIO_SEARCH_test();
EDIFICIO_DELETE_test();
EDIFICIO_RellenaDatos_test();
?>