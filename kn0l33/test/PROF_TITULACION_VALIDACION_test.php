<?php
// Autor : kn0l33
// Fecha : 2/12/2019
// Descripción : validacion de los atributos en back de la entidad PROF_TITULACION


//comrpueba que las validaciones en back del dni
function comprobar_DNI6(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROF_TITULACION_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el DNI no sea vacia
    //-------------------------------------------------------------------------------
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'DNI';
        $PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
        $PROF_TITULACION_array_test1['codigo_esperado'] = '00001';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';
        
        $DNI = '';
    
        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,'','');
        $arrayAux = $PROF_TITULACION->Comprobar_DNI();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
                $PROF_TITULACION_array_test1['resultado'] = 'OK';
                $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
        
        // Comprobar el DNI tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'DNI';
        $PROF_TITULACION_array_test1['error'] = 'Formato dni erróneo';
        $PROF_TITULACION_array_test1['codigo_esperado'] = '00010';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';
    
        $DNI='a';
        $PROF_TITULACION = new PROF_TITULACION_Model($DNI,'','');
        $arrayAux = $PROF_TITULACION->Comprobar_DNI();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
                $PROF_TITULACION_array_test1['resultado'] = 'OK';
                $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
    


         // Comprobar el DNI no sea menor que 3
    //-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'DNI';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_TITULACION_array_test1['codigo_esperado'] = '00003';
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $DNI='aa';
     $PROF_TITULACION = new PROF_TITULACION_Model($DNI,'','');
    $arrayAux = $PROF_TITULACION->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

                   // Comprobar el DNI no sea mayor que 9
    //-------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'DNI';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_TITULACION_array_test1['codigo_esperado'] = '00002';
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $DNI='1234567890Z';
   
     $PROF_TITULACION = new PROF_TITULACION_Model($DNI,'','');
    $arrayAux = $PROF_TITULACION->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }

    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

    
         // Comprobar el DNI tenga la letra que le corresponde
    //-------------------------------------------------------------------------------
    
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'DNI';
    $PROF_TITULACION_array_test1['error'] = 'Dni no válido';
    $PROF_TITULACION_array_test1['codigo_esperado'] = '00011';
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $DNI='87098475Z';
    
    $PROF_TITULACION = new PROF_TITULACION_Model($DNI,'','');
    $arrayAux = $PROF_TITULACION->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

    // Comprobar el DNI es CORRECTO
    //-------------------------------------------------------------------------------

    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'DNI';
    $PROF_TITULACION_array_test1['error'] = 'Correcto';
    $PROF_TITULACION_array_test1['codigo_esperado'] = true;
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    
    $DNI = '14889556T';

    $PROF_TITULACION = new PROF_TITULACION_Model($DNI,'','');
    $PROF_TITULACION_array_test1['codigo_obtenido'] = $PROF_TITULACION->Comprobar_DNI();

    if( $PROF_TITULACION_array_test1['codigo_obtenido'] == $PROF_TITULACION_array_test1['codigo_esperado']){
        $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
}




//funcion para comprobar las validaciones de CODTITULACION
function comprobar_CODTITULACION2(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $PROF_TITULACION_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODTITULACION es vacio 
//-------------------------------------------------------------------------------
	$PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
	$PROF_TITULACION_array_test1['metodo'] = 'CODTITULACION';
	$PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
	$PROF_TITULACION_array_test1['codigo_esperado'] = '00001';
	$PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';
    
    $CODTITULACION = '';

    $PROF_TITULACION = new PROF_TITULACION_Model('', $CODTITULACION ,'');
    $arrayAux = $PROF_TITULACION->Comprobar_CODTITULACION();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
    
    // Comprobar el CODTITULACION es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_TITULACION_array_test1['codigo_esperado'] = '00003';
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $CODTITULACION='a';
    $PROF_TITULACION = new PROF_TITULACION_Model('', $CODTITULACION ,'');
    $arrayAux = $PROF_TITULACION->Comprobar_CODTITULACION();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

        // Comprobar el CODTITULACION es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $PROF_TITULACION_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_TITULACION_array_test1['codigo_esperado'] = '00002';
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $CODTITULACION='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $PROF_TITULACION = new PROF_TITULACION_Model('', $CODTITULACION ,'');
    $arrayAux = $PROF_TITULACION->Comprobar_CODTITULACION();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

            // Comprobar el CODTITULACION solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $PROF_TITULACION_array_test1['error'] = 'Solo se permiten alfabéticos y números ';
    $PROF_TITULACION_array_test1['codigo_esperado'] = '00060';
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $CODTITULACION='/*/*';
    $PROF_TITULACION = new PROF_TITULACION_Model('', $CODTITULACION ,'');
    $arrayAux = $PROF_TITULACION->Comprobar_CODTITULACION();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
            $PROF_TITULACION_array_test1['resultado'] = 'OK';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

     // Comprobar el CODTITULACION es CORRECTO
    //-------------------------------------------------------------------------------

    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'CODTITULACION';
    $PROF_TITULACION_array_test1['error'] = 'correcto';
    $PROF_TITULACION_array_test1['codigo_esperado'] = true;
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $CODTITULACION = 'aaaa';

    $PROF_TITULACION = new PROF_TITULACION_Model('', $CODTITULACION ,'');   
    $PROF_TITULACION_array_test1['codigo_obtenido'] = $PROF_TITULACION->Comprobar_CODTITULACION();

    if( $PROF_TITULACION_array_test1['codigo_obtenido'] === $PROF_TITULACION_array_test1['codigo_esperado']){
        $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
}



//comrpueba que las validaciones en back del ANHOACADEMICO
function comprobar_ANHOACADEMICO(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROF_TITULACION_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el ANHOACADEMICO no sea vacia
    //-------------------------------------------------------------------------------
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'ANHOACADEMICO';
        $PROF_TITULACION_array_test1['error'] = 'Atributo vacío';
        $PROF_TITULACION_array_test1['codigo_esperado'] = '00001';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';
        
        $ANHOACADEMICO = '';
    
        $PROF_TITULACION = new PROF_TITULACION_Model('','',$ANHOACADEMICO);
        $arrayAux = $PROF_TITULACION->Comprobar_ANHOACADEMICO();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
                $PROF_TITULACION_array_test1['resultado'] = 'OK';
                $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
        
        // Comprobar el ANHOACADEMICO tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
        $PROF_TITULACION_array_test1['metodo'] = 'ANHOACADEMICO';
        $PROF_TITULACION_array_test1['error'] = 'Solo se permiten dddd-dddd';
        $PROF_TITULACION_array_test1['codigo_esperado'] = '00110';
        $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
        $PROF_TITULACION_array_test1['resultado'] = '';
    
        $ANHOACADEMICO='a';
        $PROF_TITULACION = new PROF_TITULACION_Model('','',$ANHOACADEMICO);
        $arrayAux = $PROF_TITULACION->Comprobar_ANHOACADEMICO();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROF_TITULACION_array_test1['codigo_esperado']){
                $PROF_TITULACION_array_test1['resultado'] = 'OK';
                $PROF_TITULACION_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROF_TITULACION_array_test1['resultado'] !== 'OK'){
            $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
            $PROF_TITULACION_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);

        // Comprobar el ANHOACADEMICO es CORRECTO
    //-------------------------------------------------------------------------------

    $PROF_TITULACION_array_test1['entidad'] = 'PROF_TITULACION';	
    $PROF_TITULACION_array_test1['metodo'] = 'ANHOACADEMICO';
    $PROF_TITULACION_array_test1['error'] = 'correcto';
    $PROF_TITULACION_array_test1['codigo_esperado'] = true;
    $PROF_TITULACION_array_test1['codigo_obtenido'] = '';
    $PROF_TITULACION_array_test1['resultado'] = '';

    $ANHOACADEMICO='2019-2020';
    $PROF_TITULACION = new PROF_TITULACION_Model('','',$ANHOACADEMICO);
    $PROF_TITULACION_array_test1['codigo_obtenido'] = $PROF_TITULACION->Comprobar_ANHOACADEMICO();

    if($PROF_TITULACION_array_test1['codigo_obtenido'] ===$PROF_TITULACION_array_test1['codigo_esperado']){
        $PROF_TITULACION_array_test1['resultado'] = 'OK';
    }else{
        $PROF_TITULACION_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_TITULACION_array_test1);
    

}
comprobar_DNI6();
comprobar_CODTITULACION2();
comprobar_ANHOACADEMICO();
?>