<?php
// Autor : kn0l33
// Fecha :2/12/2019
// Descripción : validacion de los atributos en back de la entidad centro

//funcion para comprobar las validaciones de CODCENTRO 
function comprobar_CODCENTRO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $CENTRO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODCENTRO es vacio 
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CODCENTRO';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['codigo_esperado'] = '00001';
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $CODCENTRO = '';

    $CENTRO = new  CENTRO_Model($CODCENTRO,'','','','');
    $arrayAux = $CENTRO->Comprobar_CODCENTRO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
    
    // Comprobar el CODCENTRO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'CODCENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['codigo_esperado'] = '00003';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $CODCENTRO='a';
    $CENTRO = new  CENTRO_Model($CODCENTRO,'','','','');
    $arrayAux = $CENTRO->Comprobar_CODCENTRO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

        // Comprobar el CODCENTRO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'CODCENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['codigo_esperado'] = '00002';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $CODCENTRO='aaaaaaaaaaaaaaaaa';
    $CENTRO = new  CENTRO_Model($CODCENTRO,'','','','');
    $arrayAux = $CENTRO->Comprobar_CODCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

            // Comprobar el CODCENTRO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'CODCENTRO';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $CENTRO_array_test1['codigo_esperado'] = '00040';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $CODCENTRO='/*/*';
    $CENTRO = new  CENTRO_Model($CODCENTRO,'','','','');
    $arrayAux = $CENTRO->Comprobar_CODCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);


    // Comprobar el CODCENTRO es correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CODCENTRO';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['codigo_esperado'] = true;
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $CODCENTRO = 'aaaaaa';

    $CENTRO = new  CENTRO_Model($CODCENTRO,'','','','');
    $CENTRO_array_test1['codigo_obtenido'] = $CENTRO->Comprobar_CODCENTRO();

    if( $CENTRO_array_test1['codigo_obtenido'] == $CENTRO_array_test1['codigo_esperado']){
        $CENTRO_array_test1['resultado'] = 'OK';
    }else{
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

}

//funcion para comprobar las validaciones de CODEDIFICIO 
function comprobar_CODEDIFICIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $CENTRO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODEDIFICIO es vacio 
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CODEDIFICIO';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['codigo_esperado'] = '00001';
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $CODEDIFICIO = '';

    $CENTRO = new  CENTRO_Model('',$CODEDIFICIO,'','','');
    $arrayAux = $CENTRO->Comprobar_CODEDIFICIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
    
    // Comprobar el CODEDIFICIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'CODEDIFICIO';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['codigo_esperado'] = '00003';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $CODEDIFICIO='a';
    $CENTRO = new  CENTRO_Model('',$CODEDIFICIO,'','','');
    $arrayAux = $CENTRO->Comprobar_CODEDIFICIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

        // Comprobar el CODEDIFICIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'CODEDIFICIO';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['codigo_esperado'] = '00002';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $CODEDIFICIO='aaaaaaaaaaaaaaaaa';
    $CENTRO = new  CENTRO_Model('',$CODEDIFICIO,'','','');
    $arrayAux = $CENTRO->Comprobar_CODEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

            // Comprobar el CODEDIFICIO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'CODEDIFICIO';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $CENTRO_array_test1['codigo_esperado'] = '00040';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $CODEDIFICIO='/*/*';
    $CENTRO = new  CENTRO_Model('',$CODEDIFICIO,'','','');
    $arrayAux = $CENTRO->Comprobar_CODEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);


        // Comprobar el CODEDIFICIO es correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'CODEDIFICIO';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['codigo_esperado'] = true;
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $CODEDIFICIO = 'aaaaaa';

    $CENTRO = new  CENTRO_Model('',$CODEDIFICIO,'','','');
    $CENTRO_array_test1['codigo_obtenido'] = $CENTRO->Comprobar_CODEDIFICIO();

    if( $CENTRO_array_test1['codigo_obtenido'] == $CENTRO_array_test1['codigo_esperado']){
        $CENTRO_array_test1['resultado'] = 'OK';
    }else{
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
}


//funcion para comprobar las validaciones de NOMBRECENTRO 
function comprobar_NOMBRECENTRO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $CENTRO_array_test1 = array();
    $arrayAux = array();

// Comprobar el NOMBRECENTRO es vacio 
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'NOMBRECENTRO';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['codigo_esperado'] = '00001';
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $NOMBRECENTRO = '';

    $CENTRO = new  CENTRO_Model('','',$NOMBRECENTRO,'','');
    $arrayAux = $CENTRO->Comprobar_NOMBRECENTRO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
    
    // Comprobar el NOMBRECENTRO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'NOMBRECENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['codigo_esperado'] = '00003';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $NOMBRECENTRO='a';
    $CENTRO = new  CENTRO_Model('','',$NOMBRECENTRO,'','');
    $arrayAux = $CENTRO->Comprobar_NOMBRECENTRO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

        // Comprobar el NOMBRECENTRO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'NOMBRECENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['codigo_esperado'] = '00002';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $NOMBRECENTRO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $CENTRO = new  CENTRO_Model('','',$NOMBRECENTRO,'','');
    $arrayAux = $CENTRO->Comprobar_NOMBRECENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

            // Comprobar el NOMBRECENTRO solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'NOMBRECENTRO';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $CENTRO_array_test1['codigo_esperado'] = '00030';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $NOMBRECENTRO='234325';
    $CENTRO = new  CENTRO_Model('','',$NOMBRECENTRO,'','');
    $arrayAux = $CENTRO->Comprobar_NOMBRECENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

            // Comprobar el NOMBRECENTRO es correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'NOMBRECENTRO';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['codigo_esperado'] = true;
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $NOMBRECENTRO = 'aaaaaa';

    $CENTRO = new  CENTRO_Model('','',$NOMBRECENTRO,'','');
    $CENTRO_array_test1['codigo_obtenido'] = $CENTRO->Comprobar_NOMBRECENTRO();

    if( $CENTRO_array_test1['codigo_obtenido'] == $CENTRO_array_test1['codigo_esperado']){
        $CENTRO_array_test1['resultado'] = 'OK';
    }else{
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

}

//funcion para comprobar las validaciones de DIRECCIONCENTRO 
function comprobar_DIRECCIONCENTRO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $CENTRO_array_test1 = array();
    $arrayAux = array();

// Comprobar el DIRECCIONCENTRO es vacio 
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'DIRECCION CENTRO';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['codigo_esperado'] = '00001';
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $DIRECCIONCENTRO = '';

    $CENTRO = new  CENTRO_Model('','','',$DIRECCIONCENTRO,'');
    $arrayAux = $CENTRO->Comprobar_DIRECCIONCENTRO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
    
    // Comprobar el DIRECCIONCENTRO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'DIRECCION CENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['codigo_esperado'] = '00003';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $DIRECCIONCENTRO='a';
    $CENTRO = new  CENTRO_Model('','','',$DIRECCIONCENTRO,'');
    $arrayAux = $CENTRO->Comprobar_DIRECCIONCENTRO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

        // Comprobar el DIRECCIONCENTRO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'DIRECCION CENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['codigo_esperado'] = '00002';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $DIRECCIONCENTRO='AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
    $CENTRO = new  CENTRO_Model('','','',$DIRECCIONCENTRO,'');
    $arrayAux = $CENTRO->Comprobar_DIRECCIONCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

            // Comprobar el DIRECCIONCENTRO solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'DIRECCION CENTRO';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y los símbolos  “- / º ª” ';
    $CENTRO_array_test1['codigo_esperado'] = '00050';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $DIRECCIONCENTRO='$%&*';
    $CENTRO = new  CENTRO_Model('','','',$DIRECCIONCENTRO,'');
    $arrayAux = $CENTRO->Comprobar_DIRECCIONCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

    
            // Comprobar el DIRECCIONCENTRO es correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'DIRECCIONCENTRO';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['codigo_esperado'] = true;
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $DIRECCIONCENTRO = 'aaaaaa';

    $CENTRO = new  CENTRO_Model('','','',$DIRECCIONCENTRO,'');
    $CENTRO_array_test1['codigo_obtenido'] = $CENTRO->Comprobar_DIRECCIONCENTRO();

    if( $CENTRO_array_test1['codigo_obtenido'] == $CENTRO_array_test1['codigo_esperado']){
        $CENTRO_array_test1['resultado'] = 'OK';
    }else{
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

}

//funcion para comprobar las validaciones de RESPONSABLECENTRO 
function comprobar_RESPONSABLECENTRO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $CENTRO_array_test1 = array();
    $arrayAux = array();

// Comprobar el RESPONSABLECENTRO es vacio 
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RESPONSABLE CENTRO';
	$CENTRO_array_test1['error'] = 'Atributo vacío';
	$CENTRO_array_test1['codigo_esperado'] = '00001';
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $RESPONSABLECENTRO = '';

    $CENTRO = new  CENTRO_Model('','','','',$RESPONSABLECENTRO);
    $arrayAux = $CENTRO->Comprobar_RESPONSABLECENTRO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);
    
    // Comprobar el RESPONSABLECENTRO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'RESPONSABLE CENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $CENTRO_array_test1['codigo_esperado'] = '00003';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $RESPONSABLECENTRO='a';
    $CENTRO = new  CENTRO_Model('','','','',$RESPONSABLECENTRO);
    $arrayAux = $CENTRO->Comprobar_RESPONSABLECENTRO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

        // Comprobar el RESPONSABLECENTRO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'RESPONSABLE CENTRO';
    $CENTRO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $CENTRO_array_test1['codigo_esperado'] = '00002';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $RESPONSABLECENTRO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $CENTRO = new  CENTRO_Model('','','','',$RESPONSABLECENTRO);
    $arrayAux = $CENTRO->Comprobar_RESPONSABLECENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

            // Comprobar el RESPONSABLECENTRO solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $CENTRO_array_test1['entidad'] = 'CENTRO';	
    $CENTRO_array_test1['metodo'] = 'RESPONSABLE CENTRO';
    $CENTRO_array_test1['error'] = 'Solo están permitidas alfabéticos';
    $CENTRO_array_test1['codigo_esperado'] = '00030';
    $CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';

    $RESPONSABLECENTRO='234325';
    $CENTRO = new  CENTRO_Model('','','','',$RESPONSABLECENTRO);
    $arrayAux = $CENTRO->Comprobar_RESPONSABLECENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$CENTRO_array_test1['codigo_esperado']){
            $CENTRO_array_test1['resultado'] = 'OK';
            $CENTRO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($CENTRO_array_test1['resultado'] !== 'OK'){
        $CENTRO_array_test1['resultado'] = 'FALSE';
        $CENTRO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

     // Comprobar el RESPONSABLECENTRO es correcto
//-------------------------------------------------------------------------------
	$CENTRO_array_test1['entidad'] = 'CENTRO';	
	$CENTRO_array_test1['metodo'] = 'RESPONSABLECENTRO';
	$CENTRO_array_test1['error'] = 'correcto';
	$CENTRO_array_test1['codigo_esperado'] = true;
	$CENTRO_array_test1['codigo_obtenido'] = '';
    $CENTRO_array_test1['resultado'] = '';
    
    $RESPONSABLECENTRO = 'aaaaaa';

    $CENTRO = new  CENTRO_Model('','','','',$RESPONSABLECENTRO);
    $CENTRO_array_test1['codigo_obtenido'] = $CENTRO->Comprobar_RESPONSABLECENTRO();

    if( $CENTRO_array_test1['codigo_obtenido'] == $CENTRO_array_test1['codigo_esperado']){
        $CENTRO_array_test1['resultado'] = 'OK';
    }else{
        $CENTRO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $CENTRO_array_test1);

}
comprobar_CODCENTRO();
comprobar_CODEDIFICIO();
comprobar_NOMBRECENTRO();
comprobar_DIRECCIONCENTRO();
comprobar_RESPONSABLECENTRO();

?>