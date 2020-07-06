<?php
// Autor : kn0l33
// Fecha :2/12/2019
// Descripción : validacion de los atributos en back de la entidad espacio

//funcion para comprobar las validaciones de CODESPACIO
function comprobar_CODESPACIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODESPACIO es vacio 
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CODESPACIO';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['codigo_esperado'] = '00001';
	$ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    
    $CODESPACIO = '';

    $ESPACIO = new ESPACIO_Model($CODESPACIO,'','','','','');
    $arrayAux = $ESPACIO->Comprobar_CODESPACIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
    
    // Comprobar el CODESPACIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $ESPACIO_array_test1['codigo_esperado'] = '00003';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO='a';
    $ESPACIO = new ESPACIO_Model($CODESPACIO,'','','','','');
    $arrayAux = $ESPACIO->Comprobar_CODESPACIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

        // Comprobar el CODESPACIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['codigo_esperado'] = '00002';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $ESPACIO = new ESPACIO_Model($CODESPACIO,'','','','','');
    $arrayAux = $ESPACIO->Comprobar_CODESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

            // Comprobar el CODESPACIO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $ESPACIO_array_test1['codigo_esperado'] = '00040';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO='/*/*';
    $ESPACIO = new ESPACIO_Model($CODESPACIO,'','','','','');
    $arrayAux = $ESPACIO->Comprobar_CODESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

     // Comprobar el CODESPACIO es CORRECTO
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $ESPACIO_array_test1['error'] = 'correcto';
    $ESPACIO_array_test1['codigo_esperado'] = true;
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO = 'aaaaaa';

    $ESPACIO = new ESPACIO_Model($CODESPACIO,'','','','','');
    $ESPACIO_array_test1['codigo_obtenido'] = $ESPACIO->Comprobar_CODESPACIO();

    if( $ESPACIO_array_test1['codigo_obtenido'] == $ESPACIO_array_test1['codigo_esperado']){
        $ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

}

//funcion para comprobar las validaciones de CODCENTRO
function comprobar_CODCENTRO1(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODCENTRO es vacio 
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CODCENTRO';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['codigo_esperado'] = '00001';
	$ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    
    $CODCENTRO = '';

    $ESPACIO = new ESPACIO_Model('','',$CODCENTRO,'','','');
    $arrayAux = $ESPACIO->Comprobar_CODCENTRO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
    
    // Comprobar el CODCENTRO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODCENTRO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $ESPACIO_array_test1['codigo_esperado'] = '00003';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODCENTRO='a';
    $ESPACIO = new ESPACIO_Model('','',$CODCENTRO,'','','');
    $arrayAux = $ESPACIO->Comprobar_CODCENTRO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

        // Comprobar el CODCENTRO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODCENTRO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['codigo_esperado'] = '00002';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODCENTRO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $ESPACIO = new ESPACIO_Model('','',$CODCENTRO,'','','');
    $arrayAux = $ESPACIO->Comprobar_CODCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

            // Comprobar el CODCENTRO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODCENTRO';
    $ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $ESPACIO_array_test1['codigo_esperado'] = '00040';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODCENTRO='/*/*';
    $ESPACIO = new ESPACIO_Model('','',$CODCENTRO,'','','');
    $arrayAux = $ESPACIO->Comprobar_CODCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

         // Comprobar el CODCENTRO es CORRECTO
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODCENTRO';
    $ESPACIO_array_test1['error'] = 'correcto';
    $ESPACIO_array_test1['codigo_esperado'] = true;
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODCENTRO = 'aaaaaa';

    $ESPACIO = new ESPACIO_Model('','',$CODCENTRO,'','','');
    $ESPACIO_array_test1['codigo_obtenido'] = $ESPACIO->Comprobar_CODCENTRO();

    if( $ESPACIO_array_test1['codigo_obtenido'] == $ESPACIO_array_test1['codigo_esperado']){
        $ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

}

//funcion para comprobar las validaciones de CODEDIFICIO
function comprobar_CODEDIFICIO2(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODEDIFICIO es vacio 
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'CODEDIFICIO';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['codigo_esperado'] = '00001';
	$ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    
    $CODEDIFICIO = '';

    $ESPACIO = new ESPACIO_Model('',$CODEDIFICIO,'','','','');
    $arrayAux = $ESPACIO->Comprobar_CODEDIFICIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
    
    // Comprobar el CODEDIFICIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODEDIFICIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $ESPACIO_array_test1['codigo_esperado'] = '00003';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODEDIFICIO='a';
    $ESPACIO = new ESPACIO_Model('',$CODEDIFICIO,'','','','');
    $arrayAux = $ESPACIO->Comprobar_CODEDIFICIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

        // Comprobar el CODEDIFICIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODEDIFICIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['codigo_esperado'] = '00002';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODEDIFICIO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $ESPACIO = new ESPACIO_Model('',$CODEDIFICIO,'','','','');
    $arrayAux = $ESPACIO->Comprobar_CODEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

            // Comprobar el CODEDIFICIO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODEDIFICIO';
    $ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $ESPACIO_array_test1['codigo_esperado'] = '00040';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODEDIFICIO='/*/*';
    $ESPACIO = new ESPACIO_Model('',$CODEDIFICIO,'','','','');
    $arrayAux = $ESPACIO->Comprobar_CODEDIFICIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);


     // Comprobar el CODEDIFICIO es CORRECTO
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'CODEDIFICIO';
    $ESPACIO_array_test1['error'] = 'correcto';
    $ESPACIO_array_test1['codigo_esperado'] = true;
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $CODEDIFICIO = 'aaaaaa';

    $ESPACIO = new ESPACIO_Model('',$CODEDIFICIO,'','','','');
    $ESPACIO_array_test1['codigo_obtenido'] = $ESPACIO->Comprobar_CODEDIFICIO();

    if( $ESPACIO_array_test1['codigo_obtenido'] == $ESPACIO_array_test1['codigo_esperado']){
        $ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

}

//funcion para comprobar las validaciones de Tipo
function comprobar_Tipo(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el Tipo es vacio 
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'Tipo';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['codigo_esperado'] = '00001';
	$ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    
    $Tipo = '';

    $ESPACIO = new ESPACIO_Model('','','',$Tipo,'','');
    $arrayAux = $ESPACIO->Comprobar_Tipo();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
    
    // Comprobar el Tipo es despacho,laboratorio o pas
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'Tipo';
    $ESPACIO_array_test1['error'] = "Solo se permiten los valores 'DESPACHO','LABORATORIO','PAS' (tipo)";
    $ESPACIO_array_test1['codigo_esperado'] = '00080';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $Tipo='a';
    $ESPACIO = new ESPACIO_Model('','','',$Tipo,'','');
    $arrayAux = $ESPACIO->Comprobar_Tipo();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

    // Comprobar el Tipo es CORRECTO
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'Tipo';
    $ESPACIO_array_test1['error'] = 'correcto';
    $ESPACIO_array_test1['codigo_esperado'] = true;
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $Tipo = 'PAS';

    $ESPACIO = new ESPACIO_Model('','','',$Tipo,'','');
    $ESPACIO_array_test1['codigo_obtenido'] = $ESPACIO->Comprobar_Tipo();

    if( $ESPACIO_array_test1['codigo_obtenido'] == $ESPACIO_array_test1['codigo_esperado']){
        $ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);


}

//funcion para comprobar las validaciones de SUPERFICIEESPACIO
function comprobar_SUPERFICIEESPACIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el SUPERFICIEESPACIO es vacio 
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'SUPERFICIEESPACIO';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['codigo_esperado'] = '00001';
	$ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    
    $SUPERFICIEESPACIO = '';

    $ESPACIO = new ESPACIO_Model('','','','',$SUPERFICIEESPACIO,'');
    $arrayAux = $ESPACIO->Comprobar_SUPERFICIEESPACIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
    
    // Comprobar el SUPERFICIEESPACIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'SUPERFICIEESPACIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
    $ESPACIO_array_test1['codigo_esperado'] = '00004';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $SUPERFICIEESPACIO='';
    $ESPACIO = new ESPACIO_Model('','','','',$SUPERFICIEESPACIO,'');
    $arrayAux = $ESPACIO->Comprobar_SUPERFICIEESPACIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

        // Comprobar el SUPERFICIEESPACIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'SUPERFICIEESPACIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['codigo_esperado'] = '00002';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $SUPERFICIEESPACIO=55555;
    $ESPACIO = new ESPACIO_Model('','','','',$SUPERFICIEESPACIO,'');
    $arrayAux = $ESPACIO->Comprobar_SUPERFICIEESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

            // Comprobar el SUPERFICIEESPACIO solo tiene caracteres numericos
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'SUPERFICIEESPACIO';
    $ESPACIO_array_test1['error'] = 'Solo se permiten números';
    $ESPACIO_array_test1['codigo_esperado'] = '00070';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $SUPERFICIEESPACIO='asdsaf';
    $ESPACIO = new ESPACIO_Model('','','','',$SUPERFICIEESPACIO,'');
    $arrayAux = $ESPACIO->Comprobar_SUPERFICIEESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

    // Comprobar el SUPERFICIEESPACIO es CORRECTO
    //-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'SUPERFICIEESPACIO';
    $ESPACIO_array_test1['error'] = 'correcto';
    $ESPACIO_array_test1['codigo_esperado'] = true;
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $SUPERFICIEESPACIO = '123';

    $ESPACIO = new ESPACIO_Model('','','','',$SUPERFICIEESPACIO,'');
    $ESPACIO_array_test1['codigo_obtenido'] = $ESPACIO->Comprobar_SUPERFICIEESPACIO();

    if( $ESPACIO_array_test1['codigo_obtenido'] == $ESPACIO_array_test1['codigo_esperado']){
        $ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

}


//funcion para comprobar las validaciones de NUMINVENTARIOESPACIO
function comprobar_NUMINVENTARIOESPACIO(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el NUMINVENTARIOESPACIO es vacio 
//-------------------------------------------------------------------------------
	$ESPACIO_array_test1['entidad'] = 'ESPACIO';	
	$ESPACIO_array_test1['metodo'] = 'NUMINVENTARIOESPACIO';
	$ESPACIO_array_test1['error'] = 'Atributo vacío';
	$ESPACIO_array_test1['codigo_esperado'] = '00001';
	$ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';
    
    $NUMINVENTARIOESPACIO = '';

    $ESPACIO = new ESPACIO_Model('','','','','',$NUMINVENTARIOESPACIO);
    $arrayAux = $ESPACIO->Comprobar_NUMINVENTARIOESPACIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);
    
    // Comprobar el NUMINVENTARIOESPACIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'NUMINVENTARIOESPACIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
    $ESPACIO_array_test1['codigo_esperado'] = '00004';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $NUMINVENTARIOESPACIO='';
    $ESPACIO = new ESPACIO_Model('','','','','',$NUMINVENTARIOESPACIO);
    $arrayAux = $ESPACIO->Comprobar_NUMINVENTARIOESPACIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

        // Comprobar el NUMINVENTARIOESPACIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'NUMINVENTARIOESPACIO';
    $ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $ESPACIO_array_test1['codigo_esperado'] = '00002';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $NUMINVENTARIOESPACIO=55555555555555555555555555555555555555555555555555555555;
    $ESPACIO = new ESPACIO_Model('','','','','',$NUMINVENTARIOESPACIO);
    $arrayAux = $ESPACIO->Comprobar_NUMINVENTARIOESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);

            // Comprobar el NUMINVENTARIOESPACIO solo tiene caracteres numericos
//--------------------------------------------------------------------------------
    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'NUMINVENTARIOESPACIO';
    $ESPACIO_array_test1['error'] = 'Solo se permiten números';
    $ESPACIO_array_test1['codigo_esperado'] = '00070';
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $NUMINVENTARIOESPACIO='asdsaf';
    $ESPACIO = new ESPACIO_Model('','','','','',$NUMINVENTARIOESPACIO);
    $arrayAux = $ESPACIO->Comprobar_NUMINVENTARIOESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$ESPACIO_array_test1['codigo_esperado']){
            $ESPACIO_array_test1['resultado'] = 'OK';
            $ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($ESPACIO_array_test1['resultado'] !== 'OK'){
        $ESPACIO_array_test1['resultado'] = 'FALSE';
        $ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);


    
    // Comprobar el NUMINVENTARIOESPACIO es CORRECTO
    //-------------------------------------------------------------------------------

    $ESPACIO_array_test1['entidad'] = 'ESPACIO';	
    $ESPACIO_array_test1['metodo'] = 'NUMINVENTARIOESPACIO';
    $ESPACIO_array_test1['error'] = 'correcto';
    $ESPACIO_array_test1['codigo_esperado'] = true;
    $ESPACIO_array_test1['codigo_obtenido'] = '';
    $ESPACIO_array_test1['resultado'] = '';

    $NUMINVENTARIOESPACIO = '123';

    $ESPACIO = new ESPACIO_Model('','','','','',$NUMINVENTARIOESPACIO);
    $ESPACIO_array_test1['codigo_obtenido'] = $ESPACIO->Comprobar_NUMINVENTARIOESPACIO();

    if( $ESPACIO_array_test1['codigo_obtenido'] == $ESPACIO_array_test1['codigo_esperado']){
        $ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $ESPACIO_array_test1);


}
comprobar_CODESPACIO();
comprobar_CODCENTRO1();
comprobar_CODEDIFICIO2();
comprobar_Tipo();
comprobar_SUPERFICIEESPACIO();
comprobar_NUMINVENTARIOESPACIO();
?>