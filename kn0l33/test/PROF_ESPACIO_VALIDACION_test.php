<?php
// Autor : kn0l33
// Fecha : 2/12/2019
// Descripción : validacion de los atributos en back de la entidad PROF_ESPACIO

//funcion para comprobar las validaciones de CODESPACIO
function comprobar_CODESPACIO2(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $PROF_ESPACIO_array_test1 = array();
    $arrayAux = array();

// Comprobar el CODESPACIO es vacio 
//-------------------------------------------------------------------------------
	$PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
	$PROF_ESPACIO_array_test1['metodo'] = 'CODESPACIO';
	$PROF_ESPACIO_array_test1['error'] = 'Atributo vacío';
	$PROF_ESPACIO_array_test1['codigo_esperado'] = '00001';
	$PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';
    
    $CODESPACIO = '';

    $PROF_ESPACIO = new PROF_ESPACIO_Model('',$CODESPACIO);
    $arrayAux = $PROF_ESPACIO->Comprobar_CODESPACIO();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
    
    // Comprobar el CODESPACIO es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $PROF_ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = '00003';
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO='a';
    $PROF_ESPACIO = new PROF_ESPACIO_Model('',$CODESPACIO);
    $arrayAux = $PROF_ESPACIO->Comprobar_CODESPACIO();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);

        // Comprobar el CODESPACIO es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $PROF_ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = '00002';
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $PROF_ESPACIO = new PROF_ESPACIO_Model('',$CODESPACIO);
    $arrayAux = $PROF_ESPACIO->Comprobar_CODESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);

            // Comprobar el CODESPACIO solo tiene caracteres alfabeticos,numeros y "-"
//--------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $PROF_ESPACIO_array_test1['error'] = 'Solo están permitidas alfabéticos, números y el “-”';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = '00040';
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO='/*/*';
    $PROF_ESPACIO = new PROF_ESPACIO_Model('',$CODESPACIO);
    $arrayAux = $PROF_ESPACIO->Comprobar_CODESPACIO();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);


    // Comprobar el CODESPACIO es CORRECTO
    //-------------------------------------------------------------------------------

    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'CODESPACIO';
    $PROF_ESPACIO_array_test1['error'] = 'correcto';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = true;
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $CODESPACIO = 'AAAA';

    $PROF_ESPACIO = new PROF_ESPACIO_Model('',$CODESPACIO);
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = $PROF_ESPACIO->Comprobar_CODESPACIO();

    if( $PROF_ESPACIO_array_test1['codigo_obtenido'] == $PROF_ESPACIO_array_test1['codigo_esperado']){
        $PROF_ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);


}

//comrpueba que las validaciones en back del dni
function comprobar_DNI1(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROF_ESPACIO_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el DNI no sea vacia
    //-------------------------------------------------------------------------------
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'DNI';
        $PROF_ESPACIO_array_test1['error'] = 'Atributo vacío';
        $PROF_ESPACIO_array_test1['codigo_esperado'] = '00001';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';
        
        $DNI = '';
    
        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,'');
        $arrayAux = $PROF_ESPACIO->Comprobar_DNI();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
                $PROF_ESPACIO_array_test1['resultado'] = 'OK';
                $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
        
        // Comprobar el DNI tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
        $PROF_ESPACIO_array_test1['metodo'] = 'DNI';
        $PROF_ESPACIO_array_test1['error'] = 'Formato dni erróneo';
        $PROF_ESPACIO_array_test1['codigo_esperado'] = '00010';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
        $PROF_ESPACIO_array_test1['resultado'] = '';
    
        $DNI='a';
        $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,'');
        $arrayAux = $PROF_ESPACIO->Comprobar_DNI();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
                $PROF_ESPACIO_array_test1['resultado'] = 'OK';
                $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
            $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);



         // Comprobar el DNI no sea menor que 3
    //-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'DNI';
    $PROF_ESPACIO_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = '00003';
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $DNI='aa';
    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,'');
    $arrayAux = $PROF_ESPACIO->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);

                   // Comprobar el DNI no sea mayor que 9
    //-------------------------------------------------------------------------------
    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'DNI';
    $PROF_ESPACIO_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = '00002';
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $DNI='1234567890Z';
    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,'');
    $arrayAux = $PROF_ESPACIO->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }

    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);
        

         // Comprobar el DNI tenga la letra que le corresponde
    //-------------------------------------------------------------------------------
    
    $PROF_ESPACIO_array_test1['entidad'] = '$PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'DNI';
    $PROF_ESPACIO_array_test1['error'] = 'Dni no válido';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = '00011';
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $DNI='87098475Z';
    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,'');
    $arrayAux = $PROF_ESPACIO->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROF_ESPACIO_array_test1['codigo_esperado']){
            $PROF_ESPACIO_array_test1['resultado'] = 'OK';
            $PROF_ESPACIO_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROF_ESPACIO_array_test1['resultado'] !== 'OK'){
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
        $PROF_ESPACIO_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);

    // Comprobar el DNI es CORRECTO
    //-------------------------------------------------------------------------------

    $PROF_ESPACIO_array_test1['entidad'] = 'PROF_ESPACIO';	
    $PROF_ESPACIO_array_test1['metodo'] = 'DNI';
    $PROF_ESPACIO_array_test1['error'] = 'correcto';
    $PROF_ESPACIO_array_test1['codigo_esperado'] = true;
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = '';
    $PROF_ESPACIO_array_test1['resultado'] = '';

    $DNI = '14889556T';

    $PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,'');    
    $PROF_ESPACIO_array_test1['codigo_obtenido'] = $PROF_ESPACIO->Comprobar_DNI();

    if( $PROF_ESPACIO_array_test1['codigo_obtenido'] == $PROF_ESPACIO_array_test1['codigo_esperado']){
        $PROF_ESPACIO_array_test1['resultado'] = 'OK';
    }else{
        $PROF_ESPACIO_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROF_ESPACIO_array_test1);

}
comprobar_CODESPACIO2();
comprobar_DNI1();


?>