<?php
// Autor : kn0l33
// Fecha : 2/12/2019
// Descripción : validacion de los atributos en back de la entidad titulacion.

//funcion para comprobar las validaciones de CODTITULACION
function comprobar_CODTITULACION(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $TITULACION_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODTITULACION es vacio 
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CODTITULACION';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['codigo_esperado'] = '00001';
	$TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';
    
    $CODTITULACION = '';

    $TITULACION = new TITULACION_Model($CODTITULACION,'','','');
    $arrayAux = $TITULACION->Comprobar_CODTITULACION();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
    
    // Comprobar el CODTITULACION es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $TITULACION_array_test1['codigo_esperado'] = '00003';
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODTITULACION='a';
    $TITULACION = new TITULACION_Model($CODTITULACION,'','','');
    $arrayAux = $TITULACION->Comprobar_CODTITULACION();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

        // Comprobar el CODTITULACION es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
    $TITULACION_array_test1['codigo_esperado'] = '00002';
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODTITULACION='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $TITULACION = new TITULACION_Model($CODTITULACION,'','','');
    $arrayAux = $TITULACION->Comprobar_CODTITULACION();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

            // Comprobar el CODTITULACION solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos y números ';
    $TITULACION_array_test1['codigo_esperado'] = '00060';
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODTITULACION='/*/*';
    $TITULACION = new TITULACION_Model($CODTITULACION,'','','');
    $arrayAux = $TITULACION->Comprobar_CODTITULACION();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

    // Comprobar el CODTITULACION es CORRECTO
    //-------------------------------------------------------------------------------

    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $TITULACION_array_test1['error'] = 'correcto';
    $TITULACION_array_test1['codigo_esperado'] = true;
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODTITULACION = 'JAVI';

    $TITULACION = new TITULACION_Model($CODTITULACION,'','','');
    $TITULACION_array_test1['codigo_obtenido'] = $TITULACION->Comprobar_CODTITULACION();

    if( $TITULACION_array_test1['codigo_obtenido'] == $TITULACION_array_test1['codigo_esperado']){
        $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

}

function comprobar_CODCENTRO_titulacion(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $TITULACION_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODCENTRO es vacio 
//-------------------------------------------------------------------------------
	$TITULACION_array_test1['entidad'] = 'TITULACION';	
	$TITULACION_array_test1['metodo'] = 'CODCENTRO';
	$TITULACION_array_test1['error'] = 'Atributo vacío';
	$TITULACION_array_test1['codigo_esperado'] = '00001';
	$TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';
    
    $CODCENTRO = '';

    $TITULACION = new  TITULACION_Model('',$CODCENTRO,'','');
    $arrayAux = $TITULACION->Comprobar_CODCENTRO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
    
    // Comprobar el CODCENTRO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODCENTRO';
    $TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $TITULACION_array_test1['codigo_esperado'] = '00003';
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODCENTRO='a';
    $TITULACION = new  TITULACION_Model('',$CODCENTRO,'','');
    $arrayAux = $TITULACION->Comprobar_CODCENTRO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

        // Comprobar el CODCENTRO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODCENTRO';
    $TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
    $TITULACION_array_test1['codigo_esperado'] = '00002';
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODCENTRO='aaaaaaaaaaaaaaaaa';
    $TITULACION = new  TITULACION_Model('',$CODCENTRO,'','');
    $arrayAux = $TITULACION->Comprobar_CODCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

            // Comprobar el CODCENTRO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODCENTRO';
    $TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $TITULACION_array_test1['codigo_esperado'] = '00040';
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODCENTRO='/*/*';
    $TITULACION = new  TITULACION_Model('',$CODCENTRO,'','');
    $arrayAux = $TITULACION->Comprobar_CODCENTRO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);


    // Comprobar el CODCENTRO es CORRECTO
    //-------------------------------------------------------------------------------

    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'CODCENTRO';
    $TITULACION_array_test1['error'] = 'correcto';
    $TITULACION_array_test1['codigo_esperado'] = true;
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $CODCENTRO = 'JAVI';

    $TITULACION = new  TITULACION_Model('',$CODCENTRO,'','');
    $TITULACION_array_test1['codigo_obtenido'] = $TITULACION->Comprobar_CODCENTRO();

    if( $TITULACION_array_test1['codigo_obtenido'] == $TITULACION_array_test1['codigo_esperado']){
        $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

}

//funcion que comprueba las validaciones del NOMBRETITULACION
function comprobar_NOMBRETITULACION(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $TITULACION_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el NOMBRETITULACION no sea vacia
    //-------------------------------------------------------------------------------
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'NOMBRETITULACION';
        $TITULACION_array_test1['error'] = 'Atributo vacío';
        $TITULACION_array_test1['codigo_esperado'] = '00001';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
        
        $NOMBRETITULACION = '';
    
        $TITULACION = new TITULACION_Model('','',$NOMBRETITULACION,'');
        $arrayAux = $TITULACION->Comprobar_NOMBRETITULACION();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
        
        // Comprobar el NOMBRETITULACION es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'NOMBRETITULACION';
        $TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $TITULACION_array_test1['codigo_esperado'] = '00003';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
    
        $NOMBRETITULACION='a';
        $TITULACION = new TITULACION_Model('','',$NOMBRETITULACION,'');
        $arrayAux = $TITULACION->Comprobar_NOMBRETITULACION();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
                $TITULACION_array_test1['resultado'] = 'OK';
                $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($TITULACION_array_test1['resultado'] !== 'OK'){
            $TITULACION_array_test1['resultado'] = 'FALSE';
            $TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
    
            // Comprobar el NOMBRETITULACION es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'NOMBRETITULACION';
        $TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
        $TITULACION_array_test1['codigo_esperado'] = '00002';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
    
        $NOMBRETITULACION='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $TITULACION = new TITULACION_Model('','',$NOMBRETITULACION,'');
        $arrayAux = $TITULACION->Comprobar_NOMBRETITULACION();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
                $TITULACION_array_test1['resultado'] = 'OK';
                $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($TITULACION_array_test1['resultado'] !== 'OK'){
            $TITULACION_array_test1['resultado'] = 'FALSE';
            $TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
    
                // Comprobar el NOMBRETITULACION solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'NOMBRETITULACION';
        $TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $TITULACION_array_test1['codigo_esperado'] = '00030';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
    
        $NOMBRETITULACION='234325';
        $TITULACION = new TITULACION_Model('','',$NOMBRETITULACION,'');
        $arrayAux = $TITULACION->Comprobar_NOMBRETITULACION();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
                $TITULACION_array_test1['resultado'] = 'OK';
                $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($TITULACION_array_test1['resultado'] !== 'OK'){
            $TITULACION_array_test1['resultado'] = 'FALSE';
            $TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

        // Comprobar el NOMBRETITULACION es CORRECTO
    //-------------------------------------------------------------------------------

    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'NOMBRETITULACION';
    $TITULACION_array_test1['error'] = 'correcto';
    $TITULACION_array_test1['codigo_esperado'] = true;
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $NOMBRETITULACION = 'JAVI';

    $TITULACION = new TITULACION_Model('','',$NOMBRETITULACION,'');
    $TITULACION_array_test1['codigo_obtenido'] = $TITULACION->Comprobar_NOMBRETITULACION();

    if( $TITULACION_array_test1['codigo_obtenido'] == $TITULACION_array_test1['codigo_esperado']){
        $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
}


//funcion que comprueba las validaciones del RESPONSABLETITULACION
function comprobar_RESPONSABLETITULACION(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $TITULACION_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el RESPONSABLETITULACION no sea vacia
    //-------------------------------------------------------------------------------
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'RESPONSABLETITULACION';
        $TITULACION_array_test1['error'] = 'Atributo vacío';
        $TITULACION_array_test1['codigo_esperado'] = '00001';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
        
        $RESPONSABLETITULACION = '';
    
        $TITULACION = new TITULACION_Model('','','',$RESPONSABLETITULACION);
        $arrayAux = $TITULACION->Comprobar_RESPONSABLETITULACION();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
            $TITULACION_array_test1['resultado'] = 'OK';
            $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($TITULACION_array_test1['resultado'] !== 'OK'){
        $TITULACION_array_test1['resultado'] = 'FALSE';
        $TITULACION_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
        
        // Comprobar el RESPONSABLETITULACION es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'RESPONSABLETITULACION';
        $TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $TITULACION_array_test1['codigo_esperado'] = '00003';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
    
        $RESPONSABLETITULACION='a';
        $TITULACION = new TITULACION_Model('','','',$RESPONSABLETITULACION);
        $arrayAux = $TITULACION->Comprobar_RESPONSABLETITULACION();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
                $TITULACION_array_test1['resultado'] = 'OK';
                $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($TITULACION_array_test1['resultado'] !== 'OK'){
            $TITULACION_array_test1['resultado'] = 'FALSE';
            $TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
    
            // Comprobar el RESPONSABLETITULACION es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'RESPONSABLETITULACION';
        $TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
        $TITULACION_array_test1['codigo_esperado'] = '00002';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
    
        $RESPONSABLETITULACION='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $TITULACION = new TITULACION_Model('','','',$RESPONSABLETITULACION);
        $arrayAux = $TITULACION->Comprobar_RESPONSABLETITULACION();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
                $TITULACION_array_test1['resultado'] = 'OK';
                $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($TITULACION_array_test1['resultado'] !== 'OK'){
            $TITULACION_array_test1['resultado'] = 'FALSE';
            $TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
    
                // Comprobar el RESPONSABLETITULACION solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $TITULACION_array_test1['entidad'] = 'TITULACION';	
        $TITULACION_array_test1['metodo'] = 'RESPONSABLETITULACION';
        $TITULACION_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $TITULACION_array_test1['codigo_esperado'] = '00030';
        $TITULACION_array_test1['codigo_obtenido'] = '';
        $TITULACION_array_test1['resultado'] = '';
    
        $RESPONSABLETITULACION='234325';
        $TITULACION = new TITULACION_Model('','','',$RESPONSABLETITULACION);
        $arrayAux = $TITULACION->Comprobar_RESPONSABLETITULACION();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$TITULACION_array_test1['codigo_esperado']){
                $TITULACION_array_test1['resultado'] = 'OK';
                $TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($TITULACION_array_test1['resultado'] !== 'OK'){
            $TITULACION_array_test1['resultado'] = 'FALSE';
            $TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);

        // Comprobar el RESPONSABLETITULACION es CORRECTO
    //-------------------------------------------------------------------------------

    $TITULACION_array_test1['entidad'] = 'TITULACION';	
    $TITULACION_array_test1['metodo'] = 'RESPONSABLETITULACION';
    $TITULACION_array_test1['error'] = 'correcto';
    $TITULACION_array_test1['codigo_esperado'] = true;
    $TITULACION_array_test1['codigo_obtenido'] = '';
    $TITULACION_array_test1['resultado'] = '';

    $RESPONSABLETITULACION = 'JAVI';

    $TITULACION = new TITULACION_Model('','','',$RESPONSABLETITULACION);
    $TITULACION_array_test1['codigo_obtenido'] = $TITULACION->Comprobar_RESPONSABLETITULACION();

    if( $TITULACION_array_test1['codigo_obtenido'] == $TITULACION_array_test1['codigo_esperado']){
        $TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $TITULACION_array_test1);
}
comprobar_CODTITULACION();
comprobar_CODCENTRO_titulacion();
comprobar_NOMBRETITULACION();
comprobar_RESPONSABLETITULACION();
?>