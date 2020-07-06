<?php
// Autor : kn0l33
// Fecha :2/12/2019
// Descripción : validacion de los atributos en back de la entidad edificio

//funcion para comprobar las validaciones de CODEDIFICIO
function comprobar_CODEDIFICIO1(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $EDIFICIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODEDIFICIO es vacio 
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CODEDIFICIO';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['codigo_esperado'] = '00001';
	$EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';
    
    $CODEDIFICIO = '';

    $EDIFICIO = new  EDIFICIO_Model($CODEDIFICIO,'','','');
    $arrayAux = $EDIFICIO->Comprobar_CODEDIFICIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
    
    // Comprobar el CODEDIFICIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CODEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $EDIFICIO_array_test1['codigo_esperado'] = '00003';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CODEDIFICIO='a';
    $EDIFICIO = new  EDIFICIO_Model($CODEDIFICIO,'','','');
    $arrayAux = $EDIFICIO->Comprobar_CODEDIFICIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

        // Comprobar el CODEDIFICIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CODEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $EDIFICIO_array_test1['codigo_esperado'] = '00002';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CODEDIFICIO='aaaaaaaaaaaaaaaaa';
    $EDIFICIO = new  EDIFICIO_Model($CODEDIFICIO,'','','');
    $arrayAux = $EDIFICIO->Comprobar_CODEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

            // Comprobar el CODEDIFICIO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CODEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $EDIFICIO_array_test1['codigo_esperado'] = '00040';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CODEDIFICIO='/*/*';
    $EDIFICIO = new  EDIFICIO_Model($CODEDIFICIO,'','','');
    $arrayAux = $EDIFICIO->Comprobar_CODEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

    // Comprobar el CODEDIFICIO es CORRECTO
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CODEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'correcto';
    $EDIFICIO_array_test1['codigo_esperado'] = true;
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CODEDIFICIO = 'aaaaaa';

    $EDIFICIO = new  EDIFICIO_Model($CODEDIFICIO,'','','');
    $EDIFICIO_array_test1['codigo_obtenido'] = $EDIFICIO->Comprobar_CODEDIFICIO();

    if( $EDIFICIO_array_test1['codigo_obtenido'] == $EDIFICIO_array_test1['codigo_esperado']){
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
}


//funcion para comprobar las validaciones de NOMBREEDIFICIO
function comprobar_NOMBREEDIFICIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $EDIFICIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el NOMBREEDIFICIO es vacio 
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'NOMBREEDIFICIO';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['codigo_esperado'] = '00001';
	$EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';
    
    $NOMBREEDIFICIO = '';

    $EDIFICIO = new  EDIFICIO_Model('',$NOMBREEDIFICIO,'','');
    $arrayAux = $EDIFICIO->Comprobar_NOMBREEDIFICIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
    
    // Comprobar el NOMBREEDIFICIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'NOMBREEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $EDIFICIO_array_test1['codigo_esperado'] = '00003';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $NOMBREEDIFICIO='a';
    $EDIFICIO = new  EDIFICIO_Model('',$NOMBREEDIFICIO,'','');
    $arrayAux = $EDIFICIO->Comprobar_NOMBREEDIFICIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

        // Comprobar el NOMBREEDIFICIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'NOMBREEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $EDIFICIO_array_test1['codigo_esperado'] = '00002';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $NOMBREEDIFICIO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $EDIFICIO = new  EDIFICIO_Model('',$NOMBREEDIFICIO,'','');
    $arrayAux = $EDIFICIO->Comprobar_NOMBREEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

            // Comprobar el NOMBREEDIFICIO solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'NOMBREEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $EDIFICIO_array_test1['codigo_esperado'] = '00030';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $NOMBREEDIFICIO='12425';
    $EDIFICIO = new  EDIFICIO_Model('',$NOMBREEDIFICIO,'','');
    $arrayAux = $EDIFICIO->Comprobar_NOMBREEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

     // Comprobar el NOMBREEDIFICIO es CORRECTO
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'NOMBREEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'correcto';
    $EDIFICIO_array_test1['codigo_esperado'] = true;
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $NOMBREEDIFICIO = 'aaaaaa';

    $EDIFICIO = new  EDIFICIO_Model('',$NOMBREEDIFICIO,'','');
    $EDIFICIO_array_test1['codigo_obtenido'] = $EDIFICIO->Comprobar_NOMBREEDIFICIO();

    if( $EDIFICIO_array_test1['codigo_obtenido'] == $EDIFICIO_array_test1['codigo_esperado']){
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

}

//funcion para comprobar las validaciones de DIRECCIONEDIFICIO
function comprobar_DIRECCIONEDIFICIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $EDIFICIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el DIRECCIONEDIFICIO es vacio 
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'DIRECCIONEDIFICIO';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['codigo_esperado'] = '00001';
	$EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';
    
    $DIRECCIONEDIFICIO = '';

    $EDIFICIO = new  EDIFICIO_Model('','',$DIRECCIONEDIFICIO,'');
    $arrayAux = $EDIFICIO->Comprobar_DIRECCIONEDIFICIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
    
    // Comprobar el DIRECCIONEDIFICIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'DIRECCIONEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $EDIFICIO_array_test1['codigo_esperado'] = '00003';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $DIRECCIONEDIFICIO='a';
    $EDIFICIO = new  EDIFICIO_Model('','',$DIRECCIONEDIFICIO,'');
    $arrayAux = $EDIFICIO->Comprobar_DIRECCIONEDIFICIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

        // Comprobar el DIRECCIONEDIFICIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'DIRECCIONEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $EDIFICIO_array_test1['codigo_esperado'] = '00002';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $DIRECCIONEDIFICIO='AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
    $EDIFICIO = new  EDIFICIO_Model('','',$DIRECCIONEDIFICIO,'');
    $arrayAux = $EDIFICIO->Comprobar_DIRECCIONEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

            // Comprobar el DIRECCIONEDIFICIO solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'DIRECCIONEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y los símbolos  “- / º ª” ';
    $EDIFICIO_array_test1['codigo_esperado'] = '00050';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $DIRECCIONEDIFICIO='$%&';
    $EDIFICIO = new  EDIFICIO_Model('','',$DIRECCIONEDIFICIO,'');
    $arrayAux = $EDIFICIO->Comprobar_DIRECCIONEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

    // Comprobar el DIRECCIONEDIFICIO es CORRECTO
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'DIRECCIONEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'correcto';
    $EDIFICIO_array_test1['codigo_esperado'] = true;
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $DIRECCIONEDIFICIO = 'aaaaaa';

    $EDIFICIO = new  EDIFICIO_Model('','',$DIRECCIONEDIFICIO,'');
    $EDIFICIO_array_test1['codigo_obtenido'] = $EDIFICIO->Comprobar_DIRECCIONEDIFICIO();

    if( $EDIFICIO_array_test1['codigo_obtenido'] == $EDIFICIO_array_test1['codigo_esperado']){
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

    }

//funcion para comprobar las validaciones de CAMPUSEDIFICIO
function comprobar_CAMPUSEDIFICIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $EDIFICIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CAMPUSEDIFICIO es vacio 
//-------------------------------------------------------------------------------
	$EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
	$EDIFICIO_array_test1['metodo'] = 'CAMPUSEDIFICIO';
	$EDIFICIO_array_test1['error'] = 'Atributo vacío';
	$EDIFICIO_array_test1['codigo_esperado'] = '00001';
	$EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';
    
    $CAMPUSEDIFICIO = '';

    $EDIFICIO = new  EDIFICIO_Model('','','',$CAMPUSEDIFICIO);
    $arrayAux = $EDIFICIO->Comprobar_CAMPUSEDIFICIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);
    
    // Comprobar el CAMPUSEDIFICIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CAMPUSEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $EDIFICIO_array_test1['codigo_esperado'] = '00003';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CAMPUSEDIFICIO='a';
    $EDIFICIO = new  EDIFICIO_Model('','','',$CAMPUSEDIFICIO);
    $arrayAux = $EDIFICIO->Comprobar_CAMPUSEDIFICIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

        // Comprobar el CAMPUSEDIFICIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CAMPUSEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $EDIFICIO_array_test1['codigo_esperado'] = '00002';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CAMPUSEDIFICIO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $EDIFICIO = new  EDIFICIO_Model('','','',$CAMPUSEDIFICIO);
    $arrayAux = $EDIFICIO->Comprobar_CAMPUSEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

            // Comprobar el CAMPUSEDIFICIO solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CAMPUSEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $EDIFICIO_array_test1['codigo_esperado'] = '00030';
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CAMPUSEDIFICIO='12425';
    $EDIFICIO = new  EDIFICIO_Model('','','',$CAMPUSEDIFICIO);
    $arrayAux = $EDIFICIO->Comprobar_CAMPUSEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$EDIFICIO_array_test1['codigo_esperado']){
            $EDIFICIO_array_test1['resultado'] = 'OK';
            $EDIFICIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($EDIFICIO_array_test1['resultado'] !== 'OK'){
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
        $EDIFICIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

    // Comprobar el CAMPUSEDIFICIO es CORRECTO
//-------------------------------------------------------------------------------

    $EDIFICIO_array_test1['entidad'] = 'EDIFICIO';	
    $EDIFICIO_array_test1['metodo'] = 'CAMPUSEDIFICIO';
    $EDIFICIO_array_test1['error'] = 'correcto';
    $EDIFICIO_array_test1['codigo_esperado'] = true;
    $EDIFICIO_array_test1['codigo_obtenido'] = '';
    $EDIFICIO_array_test1['resultado'] = '';

    $CAMPUSEDIFICIO = 'aaaaaa';

    $EDIFICIO = new  EDIFICIO_Model('','','',$CAMPUSEDIFICIO);
    $EDIFICIO_array_test1['codigo_obtenido'] = $EDIFICIO->Comprobar_CAMPUSEDIFICIO();

    if( $EDIFICIO_array_test1['codigo_obtenido'] == $EDIFICIO_array_test1['codigo_esperado']){
        $EDIFICIO_array_test1['resultado'] = 'OK';
    }else{
        $EDIFICIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $EDIFICIO_array_test1);

}
comprobar_CODEDIFICIO1();
comprobar_NOMBREEDIFICIO();
comprobar_DIRECCIONEDIFICIO();
comprobar_CAMPUSEDIFICIO();


?>