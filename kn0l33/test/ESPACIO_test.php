<?php
// Autor : kn0l33
// Fecha :11/12/2019
// Descripción : 
//	Fichero de test de unidad de la entidad ESPACIO

include '../Model/ESPACIO_Model.php';


//comprobacion del metodo add
function ESPACIO_ADD_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $ESPACIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
        $ESPACIO_array_test1['metodo'] = 'ADD';
        $ESPACIO_array_test1['error'] = 'Inserción fallida: el elemento ya existe';
        $ESPACIO_array_test1['error_esperado'] = 'Inserción fallida: el elemento ya existe';
        $ESPACIO_array_test1['error_obtenido'] = '';
        $ESPACIO_array_test1['resultado'] = '';

       
        $CODESPACIO="aaaa";
        $CODEDIFICIO="aaaa";
        $CODCENTRO="aaaa";
        $TIPO='PAS';
        $SUPERFICIEESPACIO=22;
        $NUMINVENTARIOESPACIO=22;

        $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
        $ESPACIO->ADD();

        $ESPACIO_array_test1['error_obtenido'] = $ESPACIO->ADD();
        if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
        {
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
        $ESPACIO->DELETE();

        // Comprobar que se inserta correctamente
        $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
        $ESPACIO_array_test1['metodo'] = 'ADD';
        $ESPACIO_array_test1['error'] = 'Inserción realizada con éxito';
        $ESPACIO_array_test1['error_esperado'] = 'Inserción realizada con éxito';
        $ESPACIO_array_test1['error_obtenido'] = '';
        $ESPACIO_array_test1['resultado'] = '';

        $CODESPACIO="aaaa";
        $CODEDIFICIO="aaaa";
        $CODCENTRO="aaaa";
        $TIPO='PAS';
        $SUPERFICIEESPACIO=22;
        $NUMINVENTARIOESPACIO=22;

        $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
       

        $ESPACIO_array_test1['error_obtenido'] = $ESPACIO->ADD();
        if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
        {
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
        $ESPACIO->DELETE();
}

//comprobacion del metodo edit
function ESPACIO_EDIT_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $ESPACIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
        $ESPACIO_array_test1['metodo'] = 'EDIT';
        $ESPACIO_array_test1['error'] = 'Actualización realizada con éxito';
        $ESPACIO_array_test1['error_esperado'] = 'Actualización realizada con éxito';
        $ESPACIO_array_test1['error_obtenido'] = '';
        $ESPACIO_array_test1['resultado'] = '';

        $CODESPACIO="aaaa";
        $CODEDIFICIO="aaaa";
        $CODCENTRO="aaaa";
        $TIPO='PAS';
        $SUPERFICIEESPACIO=22;
        $NUMINVENTARIOESPACIO=22;

        $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
      

        $ESPACIO_array_test1['error_obtenido'] = $ESPACIO->EDIT();
        if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
        {
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
        $ESPACIO->DELETE();

        
}


//comprobacion del metodo SEARCH
function ESPACIO_SEARCH_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $ESPACIO_array_test1 = array();
    
    // Comprobar que devuelve el recodset
        $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
        $ESPACIO_array_test1['metodo'] = 'SEARCH';
        $ESPACIO_array_test1['error'] = 'Devuelve el recordset';
        $ESPACIO_array_test1['error_esperado'] = 'object';
        $ESPACIO_array_test1['error_obtenido'] = '';
        $ESPACIO_array_test1['resultado'] = '';

        $CODESPACIO="aaaa";
        $CODEDIFICIO="aaaa";
        $CODCENTRO="aaaa";
        $TIPO='PAS';
        $SUPERFICIEESPACIO=22;
        $NUMINVENTARIOESPACIO=22;

        $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
        $ESPACIO->ADD();

                                                           


        $ESPACIO_array_test1['error_obtenido'] = gettype($ESPACIO->SEARCH());
        if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
        {
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
        $ESPACIO->DELETE();


        //error de gestor de bd

        $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
        $ESPACIO_array_test1['metodo'] = 'SEARCH';
        $ESPACIO_array_test1['error'] = 'Error de gestor de base de datos';
        $ESPACIO_array_test1['error_esperado'] = 'Error de gestor de base de datos';
        $ESPACIO_array_test1['error_obtenido'] = '';
        $ESPACIO_array_test1['resultado'] = '';



        $CODESPACIO="aaaa";
        $CODEDIFICIO="aaaa";
        $CODCENTRO='javi\' ,\'kdfalkj';
        $TIPO='PAS';
        $SUPERFICIEESPACIO=22;
        $NUMINVENTARIOESPACIO=22;

        $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
   


        $ESPACIO_array_test1['error_obtenido'] = $ESPACIO->SEARCH();
        if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
        {
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
        $ESPACIO->DELETE();
}

//comprobacion del metodo DELETE
function ESPACIO_DELETE_test()
{
    global $ERRORS_array_test;
    
    // creo array de almacen de test individual
        $ESPACIO_array_test1 = array();
    
    // Comprobar que el elemento ya existe
        $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
        $ESPACIO_array_test1['metodo'] = 'DELETE';
        $ESPACIO_array_test1['error'] = 'Borrado realizado con éxito';
        $ESPACIO_array_test1['error_esperado'] = 'Borrado realizado con éxito';
        $ESPACIO_array_test1['error_obtenido'] = '';
        $ESPACIO_array_test1['resultado'] = '';

 
        $CODESPACIO="aaaa";
        $CODEDIFICIO="aaaa";
        $CODCENTRO="aaaa";
        $TIPO='PAS';
        $SUPERFICIEESPACIO=22;
        $NUMINVENTARIOESPACIO=22;

        $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
        $ESPACIO->ADD();

        $ESPACIO_array_test1['error_obtenido'] = $ESPACIO->DELETE();
        if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
        {
            $ESPACIO_array_test1['resultado'] = 'OK';
        }
        else
        {
            $ESPACIO_array_test1['resultado'] = 'FALSE';
        }
    
        array_push($ERRORS_array_test, $ESPACIO_array_test1);
    
        

        
}


//funcion para comprobar el rellenar datos
function ESPACIO_RellenaDatos_test()
{

	global $ERRORS_array_test;
// creo array de almacen de test individual
	$ESPACIO_array_test1 = array();



// Comprobar devuelve recordset
//----------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'RellenaDatos';
	$ESPACIO_array_test1['error'] = 'Devuelve el recordset';
	$ESPACIO_array_test1['error_esperado'] = 'array';
	$ESPACIO_array_test1['error_obtenido'] = '';
	$ESPACIO_array_test1['resultado'] = '';
	
 
    $CODESPACIO="aaaa";
    $CODEDIFICIO="aaaa";
    $CODCENTRO="aaaa";
    $TIPO='PAS';
    $SUPERFICIEESPACIO=22;
    $NUMINVENTARIOESPACIO=22;

    $ESPACIO = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
	$ESPACIO->ADD();

	$ESPACIO_array_test1['error_obtenido'] = gettype($ESPACIO->RellenaDatos());
	if ($ESPACIO_array_test1['error_obtenido'] === $ESPACIO_array_test1['error_esperado'])
	{
		$ESPACIO_array_test1['resultado'] = 'OK';
	}
	else
	{
		$ESPACIO_array_test1['resultado'] = 'FALSE';
	}

	array_push($ERRORS_array_test, $ESPACIO_array_test1);

	$ESPACIO->DELETE();

}



ESPACIO_ADD_test();
ESPACIO_EDIT_test();
ESPACIO_SEARCH_test();
ESPACIO_DELETE_test();
ESPACIO_RellenaDatos_test();
?>