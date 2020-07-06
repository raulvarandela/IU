<?php 
// Autor : kn0l33
// Fecha : 2/12/2019
// Descripción : validacion de los atributos en back de la entidad PROFESOR

//comrpueba que las validaciones en back del dni
function comprobar_DNI(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el DNI no sea vacia
    //-------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DNI';
        $PROFESOR_array_test1['error'] = 'Atributo vacío';
        $PROFESOR_array_test1['codigo_esperado'] = '00001';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
        
        $DNI = '';
    
        $PROFESOR = new PROFESOR_Model($DNI,'','','','');
        $arrayAux = $PROFESOR->Comprobar_DNI();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
        
        // Comprobar el DNI tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DNI';
        $PROFESOR_array_test1['error'] = 'Formato dni erróneo';
        $PROFESOR_array_test1['codigo_esperado'] = '00010';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $DNI='a';
        $PROFESOR = new PROFESOR_Model($DNI,'','','','');
        $arrayAux = $PROFESOR->Comprobar_DNI();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    

         // Comprobar el DNI no sea menor que 3
    //-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'DNI';
    $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $PROFESOR_array_test1['codigo_esperado'] = '00003';
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $DNI='aa';
    $PROFESOR = new PROFESOR_Model($DNI,'','','','');
    $arrayAux = $PROFESOR->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);

                   // Comprobar el DNI no sea mayor que 9
    //-------------------------------------------------------------------------------
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'DNI';
    $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
    $PROFESOR_array_test1['codigo_esperado'] = '00002';
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $DNI='1234567890Z';
    $PROFESOR = new PROFESOR_Model($DNI,'','','','');
    $arrayAux = $PROFESOR->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }

    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);

    
         // Comprobar el DNI tenga la letra que le corresponde
    //-------------------------------------------------------------------------------
    
    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'DNI';
    $PROFESOR_array_test1['error'] = 'Dni no válido';
    $PROFESOR_array_test1['codigo_esperado'] = '00011';
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $DNI='87098475Z';
    $PROFESOR = new PROFESOR_Model($DNI,'','','','');
    $arrayAux = $PROFESOR->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);


    // Comprobar el DNI es CORRECTO
    //-------------------------------------------------------------------------------

    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'DNI';
    $PROFESOR_array_test1['error'] = 'correcto';
    $PROFESOR_array_test1['codigo_esperado'] = true;
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $DNI = '14889556T';

    $PROFESOR = new PROFESOR_Model($DNI,'','','','');   
    $PROFESOR_array_test1['codigo_obtenido'] = $PROFESOR->Comprobar_DNI();

    if( $PROFESOR_array_test1['codigo_obtenido'] == $PROFESOR_array_test1['codigo_esperado']){
        $PROFESOR_array_test1['resultado'] = 'OK';
    }else{
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
}

//funcion que comprueba las validaciones del NOMBREPROFESOR
function comprobar_NOMBREPROFESOR(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el NOMBREPROFESOR no sea vacia
    //-------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'NOMBREPROFESOR';
        $PROFESOR_array_test1['error'] = 'Atributo vacío';
        $PROFESOR_array_test1['codigo_esperado'] = '00001';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
        
        $NOMBREPROFESOR = '';
    
        $PROFESOR = new PROFESOR_Model('',$NOMBREPROFESOR,'','','');
        $arrayAux = $PROFESOR->Comprobar_NOMBREPROFESOR();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
        
        // Comprobar el NOMBREPROFESOR es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'NOMBREPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $PROFESOR_array_test1['codigo_esperado'] = '00003';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $NOMBREPROFESOR='a';
        $PROFESOR = new PROFESOR_Model('',$NOMBREPROFESOR,'','','');
        $arrayAux = $PROFESOR->Comprobar_NOMBREPROFESOR();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
            // Comprobar el NOMBREPROFESOR es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'NOMBREPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
        $PROFESOR_array_test1['codigo_esperado'] = '00002';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $NOMBREPROFESOR='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $PROFESOR = new PROFESOR_Model('',$NOMBREPROFESOR,'','','');
        $arrayAux = $PROFESOR->Comprobar_NOMBREPROFESOR();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
                // Comprobar el NOMBREPROFESOR solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'NOMBREPROFESOR';
        $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $PROFESOR_array_test1['codigo_esperado'] = '00030';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $NOMBREPROFESOR='234325';
        $PROFESOR = new PROFESOR_Model('',$NOMBREPROFESOR,'','','');
        $arrayAux = $PROFESOR->Comprobar_NOMBREPROFESOR();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);


        // Comprobar el NOMBREPROFESOR es CORRECTO
    //-------------------------------------------------------------------------------

    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'NOMBREPROFESOR';
    $PROFESOR_array_test1['error'] = 'correcto';
    $PROFESOR_array_test1['codigo_esperado'] = true;
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $NOMBREPROFESOR = 'JAVI';

    $PROFESOR = new PROFESOR_Model('',$NOMBREPROFESOR,'','','');  
    $PROFESOR_array_test1['codigo_obtenido'] = $PROFESOR->Comprobar_NOMBREPROFESOR();

    if( $PROFESOR_array_test1['codigo_obtenido'] == $PROFESOR_array_test1['codigo_esperado']){
        $PROFESOR_array_test1['resultado'] = 'OK';
    }else{
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
}

//funcion que comprueba las validaciones del APELLIDOSPROFESOR
function comprobar_APELLIDOSPROFESOR(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el APELLIDOSPROFESOR no sea vacia
    //-------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'APELLIDOSPROFESOR';
        $PROFESOR_array_test1['error'] = 'Atributo vacío';
        $PROFESOR_array_test1['codigo_esperado'] = '00001';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
        
        $APELLIDOSPROFESOR = '';
    
        $PROFESOR = new PROFESOR_Model('','',$APELLIDOSPROFESOR,'','');
        $arrayAux = $PROFESOR->Comprobar_APELLIDOSPROFESOR();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
        
        // Comprobar el APELLIDOSPROFESOR es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'APELLIDOSPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $PROFESOR_array_test1['codigo_esperado'] = '00003';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $APELLIDOSPROFESOR='a';
        $PROFESOR = new PROFESOR_Model('','',$APELLIDOSPROFESOR,'','');
        $arrayAux = $PROFESOR->Comprobar_APELLIDOSPROFESOR();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
            // Comprobar el APELLIDOSPROFESOR es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'APELLIDOSPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
        $PROFESOR_array_test1['codigo_esperado'] = '00002';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $APELLIDOSPROFESOR='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $PROFESOR = new PROFESOR_Model('','',$APELLIDOSPROFESOR,'','');
        $arrayAux = $PROFESOR->Comprobar_APELLIDOSPROFESOR();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
                // Comprobar el APELLIDOSPROFESOR solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'APELLIDOSPROFESOR';
        $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $PROFESOR_array_test1['codigo_esperado'] = '00030';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $APELLIDOSPROFESOR='234325';
        $PROFESOR = new PROFESOR_Model('','',$APELLIDOSPROFESOR,'','');
        $arrayAux = $PROFESOR->Comprobar_APELLIDOSPROFESOR();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);

         // Comprobar el APELLIDOSPROFESOR es CORRECTO
    //-------------------------------------------------------------------------------

    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'APELLIDOSPROFESOR';
    $PROFESOR_array_test1['error'] = 'correcto';
    $PROFESOR_array_test1['codigo_esperado'] = true;
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $APELLIDOSPROFESOR = 'JAVI';

    $PROFESOR = new PROFESOR_Model('','',$APELLIDOSPROFESOR,'',''); 
    $PROFESOR_array_test1['codigo_obtenido'] = $PROFESOR->Comprobar_APELLIDOSPROFESOR();

    if( $PROFESOR_array_test1['codigo_obtenido'] == $PROFESOR_array_test1['codigo_esperado']){
        $PROFESOR_array_test1['resultado'] = 'OK';
    }else{
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
}


//funcion que comprueba las validaciones del AREAPROFESOR
function comprobar_AREAPROFESOR(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el AREAPROFESOR no sea vacia
    //-------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'AREAPROFESOR';
        $PROFESOR_array_test1['error'] = 'Atributo vacío';
        $PROFESOR_array_test1['codigo_esperado'] = '00001';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
        
        $AREAPROFESOR = '';
    
        $PROFESOR = new PROFESOR_Model('','','',$AREAPROFESOR,'');
        $arrayAux = $PROFESOR->Comprobar_AREAPROFESOR();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
        
        // Comprobar el AREAPROFESOR es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'AREAPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $PROFESOR_array_test1['codigo_esperado'] = '00003';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $AREAPROFESOR='a';
        $PROFESOR = new PROFESOR_Model('','','',$AREAPROFESOR,'');
        $arrayAux = $PROFESOR->Comprobar_AREAPROFESOR();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
            // Comprobar el AREAPROFESOR es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'AREAPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
        $PROFESOR_array_test1['codigo_esperado'] = '00002';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $AREAPROFESOR='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $PROFESOR = new PROFESOR_Model('','','',$AREAPROFESOR,'');
        $arrayAux = $PROFESOR->Comprobar_AREAPROFESOR();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
                // Comprobar el AREAPROFESOR solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'AREAPROFESOR';
        $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $PROFESOR_array_test1['codigo_esperado'] = '00030';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $AREAPROFESOR='234325';
        $PROFESOR = new PROFESOR_Model('','','',$AREAPROFESOR,'');
        $arrayAux = $PROFESOR->Comprobar_AREAPROFESOR();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);

        // Comprobar el AREAPROFESOR es CORRECTO
    //-------------------------------------------------------------------------------

    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'AREAPROFESOR';
    $PROFESOR_array_test1['error'] = 'correcto';
    $PROFESOR_array_test1['codigo_esperado'] = true;
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $AREAPROFESOR = 'JAVI';

    $PROFESOR = new PROFESOR_Model('','','',$AREAPROFESOR,'');
    $PROFESOR_array_test1['codigo_obtenido'] = $PROFESOR->Comprobar_AREAPROFESOR();

    if( $PROFESOR_array_test1['codigo_obtenido'] == $PROFESOR_array_test1['codigo_esperado']){
        $PROFESOR_array_test1['resultado'] = 'OK';
    }else{
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
}


//funcion que comprueba las validaciones del DEPARTAMENTOPROFESOR
function comprobar_DEPARTAMENTOPROFESOR(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $PROFESOR_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el DEPARTAMENTOPROFESOR no sea vacia
    //-------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';
        $PROFESOR_array_test1['error'] = 'Atributo vacío';
        $PROFESOR_array_test1['codigo_esperado'] = '00001';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
        
        $DEPARTAMENTOPROFESOR = '';
    
        $PROFESOR = new PROFESOR_Model('','','','',$DEPARTAMENTOPROFESOR);
        $arrayAux = $PROFESOR->Comprobar_DEPARTAMENTOPROFESOR();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
            $PROFESOR_array_test1['resultado'] = 'OK';
            $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($PROFESOR_array_test1['resultado'] !== 'OK'){
        $PROFESOR_array_test1['resultado'] = 'FALSE';
        $PROFESOR_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
        
        // Comprobar el DEPARTAMENTOPROFESOR es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $PROFESOR_array_test1['codigo_esperado'] = '00003';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $DEPARTAMENTOPROFESOR='a';
        $PROFESOR = new PROFESOR_Model('','','','',$DEPARTAMENTOPROFESOR);
        $arrayAux = $PROFESOR->Comprobar_DEPARTAMENTOPROFESOR();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
            // Comprobar el DEPARTAMENTOPROFESOR es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';
        $PROFESOR_array_test1['error'] = 'Valor de atributo demasiado largo';
        $PROFESOR_array_test1['codigo_esperado'] = '00002';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $DEPARTAMENTOPROFESOR='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $PROFESOR = new PROFESOR_Model('','','','',$DEPARTAMENTOPROFESOR);
        $arrayAux = $PROFESOR->Comprobar_DEPARTAMENTOPROFESOR();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
    
                // Comprobar el DEPARTAMENTOPROFESOR solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
        $PROFESOR_array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';
        $PROFESOR_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $PROFESOR_array_test1['codigo_esperado'] = '00030';
        $PROFESOR_array_test1['codigo_obtenido'] = '';
        $PROFESOR_array_test1['resultado'] = '';
    
        $DEPARTAMENTOPROFESOR='234325';
        $PROFESOR = new PROFESOR_Model('','','','',$DEPARTAMENTOPROFESOR);
        $arrayAux = $PROFESOR->Comprobar_DEPARTAMENTOPROFESOR();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$PROFESOR_array_test1['codigo_esperado']){
                $PROFESOR_array_test1['resultado'] = 'OK';
                $PROFESOR_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($PROFESOR_array_test1['resultado'] !== 'OK'){
            $PROFESOR_array_test1['resultado'] = 'FALSE';
            $PROFESOR_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);

        // Comprobar el DEPARTAMENTOPROFESOR es CORRECTO
    //-------------------------------------------------------------------------------

    $PROFESOR_array_test1['entidad'] = 'PROFESOR';	
    $PROFESOR_array_test1['metodo'] = 'DEPARTAMENTOPROFESOR';
    $PROFESOR_array_test1['error'] = 'correcto';
    $PROFESOR_array_test1['codigo_esperado'] = true;
    $PROFESOR_array_test1['codigo_obtenido'] = '';
    $PROFESOR_array_test1['resultado'] = '';

    $DEPARTAMENTOPROFESOR = 'JAVI';

    $PROFESOR = new PROFESOR_Model('','','','',$DEPARTAMENTOPROFESOR);
    $PROFESOR_array_test1['codigo_obtenido'] = $PROFESOR->Comprobar_DEPARTAMENTOPROFESOR();

    if( $PROFESOR_array_test1['codigo_obtenido'] == $PROFESOR_array_test1['codigo_esperado']){
        $PROFESOR_array_test1['resultado'] = 'OK';
    }else{
        $PROFESOR_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $PROFESOR_array_test1);
}
comprobar_DNI();
comprobar_NOMBREPROFESOR();
comprobar_APELLIDOSPROFESOR();
comprobar_AREAPROFESOR();
comprobar_DEPARTAMENTOPROFESOR();
?>