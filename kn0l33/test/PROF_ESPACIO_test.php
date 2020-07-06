<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad PROF_ESPACIO

include '../Model/PROF_ESPACIO_Model.php';


//comprobacion del metodo add
function PROF_ESPACIO_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_ESPACIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'ADD';
        $PROF_ESPACIO_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $PROF_ESPACIO_array_test1['error_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';

        $DNI="96925636W";
        $CODESPACIO = "asddf";

        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);
        $PROF_ESPACIO->ADD();

        $PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();
        if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
        $PROF_ESPACIO->DELETE();

        // Comprobar que se inserta correctamente
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'ADD';
        $PROF_ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
        $PROF_ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $PROF_ESPACIO_array_test1['error_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';


        $DNI="96925636W";
        $CODESPACIO = "asddf";

        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);
       

        $PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->ADD();
        if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
        $PROF_ESPACIO->DELETE();
}

//comprobacion del metodo edit
function PROF_ESPACIO_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_ESPACIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'EDIT';
        $PROF_ESPACIO_array_test1['error'] = 'Actualización realizada con éxito';
        $PROF_ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $PROF_ESPACIO_array_test1['error_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';

       
        $DNI="96925636W";
        $CODESPACIO = "asddf";

        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);

        $PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->EDIT();
        if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
        $PROF_ESPACIO->DELETE();

        
}


//comprobacion del metodo SEARCH
function PROF_ESPACIO_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_ESPACIO_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
        $PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
        $PROF_ESPACIO_array_test1['error_esperado'] = 'object';
        $PROF_ESPACIO_array_test1['error_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';

    
        $DNI="96925636W";
        $CODESPACIO = "asddf";

        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);

        $PROF_ESPACIO->ADD();

                                                           


        $PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->SEARCH());
        if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
        $PROF_ESPACIO->DELETE();


        //error de gestor de bd

        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'SEARCH';
        $PROF_ESPACIO_array_test1['error'] = 'Error de gestor de base de datos';
        $PROF_ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $PROF_ESPACIO_array_test1['error_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';



    
      
        
        $DNI="96925636W";
        $CODESPACIO = 'javi\' ,\'kdfalkj';

        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);

   


        $PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->SEARCH();
        if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
        $PROF_ESPACIO->DELETE();
}

//comprobacion del metodo DELETE
function PROF_ESPACIO_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $PROF_ESPACIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'DELETE';
        $PROF_ESPACIO_array_test1['error'] = 'Borrado realizado con éxito';
        $PROF_ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $PROF_ESPACIO_array_test1['error_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';

 
        $DNI="96925636W";
        $CODESPACIO = "asddf";

        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);

        $PROF_ESPACIO->ADD();

        $PROF_ESPACIO_array_test1['error_obtenido'] = $PROF_ESPACIO->DELETE();
        if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);
    
        

        
}


//funcion para comprobar el rellenar datos
function PROF_ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$PROF_ESPACIO_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$PROF_ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$PROF_ESPACIO_array_test1['error_esperado'] = 'array';
	$PROF_ESPACIO_array_test1['error_obtenido'] = '';
	$PROF_ESPACIO_array_test1['resultado'] = '';
	
 
    $DNI="96925636W";
    $CODESPACIO = "asddf";

    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);

	$PROF_ESPACIO->ADD();

	$PROF_ESPACIO_array_test1['error_obtenido'] = gettype($PROF_ESPACIO->RellenaDatos());
	if ($PROF_ESPACIO_array_test1['error_obtenido'] === $PROF_ESPACIO_array_test1['error_esperado'])
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $PROF_ESPACIO_array_test1);

	$PROF_ESPACIO->DELETE();

}



PROF_ESPACIO_ADD_test();
PROF_ESPACIO_EDIT_test();
PROF_ESPACIO_SEARCH_test();
PROF_ESPACIO_DELETE_test();
PROF_ESPACIO_RellenaDatos_test();
?>