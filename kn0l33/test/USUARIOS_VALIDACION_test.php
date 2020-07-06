<?php
// Autor : kn0l33
// Fecha :1/12/2019
// Descripción : validacion de los atributos en back de la entidad usuarios

//funcion para comprobar las validaciones de login 
function comprobar_login(){

    global $ERRORS_array_test_validaciones;
// creo array de almacen de test individual
    $USUARIOS_array_test1 = array();
    $arrayAux = array();

// Comprobar el login es vacio 
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Atributo vacío';
	$USUARIOS_array_test1['codigo_esperado'] = '00001';
	$USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $login = '';

    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    $arrayAux = $usuarios->Comprobar_login();
    
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
    // Comprobar el login es menor que el tamaño pedido
//-------------------------------------------------------------------------------

    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'login';
    $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
    $USUARIOS_array_test1['codigo_esperado'] = '00003';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $login='a';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    $arrayAux = $usuarios->Comprobar_login();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

        // Comprobar el login es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'login';
    $USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
    $USUARIOS_array_test1['codigo_esperado'] = '00002';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $login='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    $arrayAux = $usuarios->Comprobar_login();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

            // Comprobar el login solo tiene caracteres alfabeticos
//--------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'login';
    $USUARIOS_array_test1['error'] = 'Solo se permiten alfabéticos';
    $USUARIOS_array_test1['codigo_esperado'] = '000090';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $login='234325';
    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    $arrayAux = $usuarios->Comprobar_login();
   
    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);


    // Comprobar el login es correcto
//-------------------------------------------------------------------------------
	$USUARIOS_array_test1['entidad'] = 'USUARIOS';	
	$USUARIOS_array_test1['metodo'] = 'login';
	$USUARIOS_array_test1['error'] = 'Corecto';
	$USUARIOS_array_test1['codigo_esperado'] = true;
	$USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $login = 'javi';

    $usuarios = new USUARIOS_Model($login,'','','','','','','','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_login();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }


    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
}

//funcion que comprueba las validaciones de la contraseña
function comprobar_password(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que la contraseña no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'password';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $password = '';
    
        $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
        $arrayAux = $usuarios->Comprobar_password();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar la password es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'password';
        $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $USUARIOS_array_test1['codigo_esperado'] = '00003';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $password='a';
        $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
        $arrayAux = $usuarios->Comprobar_password();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
            // Comprobar la password es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'password';
        $USUARIOS_array_test1['error'] = 'Password demasiado larga';
        $USUARIOS_array_test1['codigo_esperado'] = '00005';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $password='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
        $arrayAux = $usuarios->Comprobar_password();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
                // Comprobar la password solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'password';
        $USUARIOS_array_test1['error'] = 'Solo se permiten alfabéticos';
        $USUARIOS_array_test1['codigo_esperado'] = '000090';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $password='234325';
        $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
        $arrayAux = $usuarios->Comprobar_password();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

        // Comprobar que la contraseña es valida
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'password';
    $USUARIOS_array_test1['error'] = 'Corecto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $password = 'javi';

    $usuarios = new USUARIOS_Model('',$password,'','','','','','','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_password();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
}


//funcion que comprueba las validaciones del nombre
function comprobar_nombre(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el nombre no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'nombre';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $nombre = '';
    
        $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
        $arrayAux = $usuarios->Comprobar_nombre();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar el nombre es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'nombre';
        $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $USUARIOS_array_test1['codigo_esperado'] = '00003';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $nombre='a';
        $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
        $arrayAux = $usuarios->Comprobar_nombre();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
            // Comprobar el nombre es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'nombre';
        $USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
        $USUARIOS_array_test1['codigo_esperado'] = '00002';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $nombre='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
        $arrayAux = $usuarios->Comprobar_nombre();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
                // Comprobar el nombre solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'nombre';
        $USUARIOS_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $USUARIOS_array_test1['codigo_esperado'] = '00030';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $nombre='234325';
        $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
        $arrayAux = $usuarios->Comprobar_nombre();
       
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);


        // Comprobar que el nombre es corecto
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'nombre';
    $USUARIOS_array_test1['error'] = 'Correcto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $nombre = 'javi';

    $usuarios = new USUARIOS_Model('','','',$nombre,'','','','','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_nombre();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
}

//comrpueba que las validaciones en back del dni
function comprobar_DNI_usuarios(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el DNI no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'DNI';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $DNI = '';
    
        $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
        $arrayAux = $usuarios->Comprobar_DNI();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar el DNI tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'DNI';
        $USUARIOS_array_test1['error'] = 'Formato dni erróneo';
        $USUARIOS_array_test1['codigo_esperado'] = '00010';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $DNI='a';
        $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
        $arrayAux = $usuarios->Comprobar_DNI();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

               // Comprobar el DNI no sea menor que 3
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'DNI';
        $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $USUARIOS_array_test1['codigo_esperado'] = '00003';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $DNI='aa';
        $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
        $arrayAux = $usuarios->Comprobar_DNI();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

                       // Comprobar el DNI no sea mayor que 9
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'DNI';
    $USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
    $USUARIOS_array_test1['codigo_esperado'] = '00002';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $DNI='1234567890Z';
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    $arrayAux = $usuarios->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);


         // Comprobar el DNI tenga la letra que le corresponde
    //-------------------------------------------------------------------------------
    
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'DNI';
    $USUARIOS_array_test1['error'] = 'Dni no válido';
    $USUARIOS_array_test1['codigo_esperado'] = '00011';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $DNI='87098475Z';
    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    $arrayAux = $usuarios->Comprobar_DNI();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

    // Comprobar que el DNI es correcto
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'DNI';
    $USUARIOS_array_test1['error'] = 'Correcto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $DNI = '02936951N';

    $usuarios = new USUARIOS_Model('','',$DNI,'','','','','','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_DNI();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
}

//funcion que comprueba las validaciones de los apellidos
function comprobar_apellidos(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que los apellidos no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'apellidos';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $apellidos = '';
    
        $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
        $arrayAux = $usuarios->Comprobar_apellidos();
        
       foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar los apellidos es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'apellidos';
        $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $USUARIOS_array_test1['codigo_esperado'] = '00003';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $apellidos='a';
        $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
        $arrayAux = $usuarios->Comprobar_apellidos();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
            // Comprobar los apellidos es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'apellidos';
        $USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
        $USUARIOS_array_test1['codigo_esperado'] = '00002';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $apellidos='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
        $arrayAux = $usuarios->Comprobar_apellidos();

       foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
                // Comprobar los apellidos solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'apellidos';
        $USUARIOS_array_test1['error'] = 'Solo están permitidas alfabéticos';
        $USUARIOS_array_test1['codigo_esperado'] = '00030';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $apellidos='234325';
        $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
        $arrayAux = $usuarios->Comprobar_apellidos();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

         // Comprobar que los apellidos estén correctos
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'apellidos';
    $USUARIOS_array_test1['error'] = 'Correcto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $apellidos = 'javi';

    $usuarios = new USUARIOS_Model('','','','',$apellidos,'','','','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_apellidos();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
}

//funcion que comprueba las validaciones del telefono
function comprobar_telefono(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el telefono no sea vacio
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'telefono';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $telefono = '';
    
        $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
        $arrayAux = $usuarios->Comprobar_telefono();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar el telefono es el formato pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'telefono';
        $USUARIOS_array_test1['error'] = 'Teléfono no válido';
        $USUARIOS_array_test1['codigo_esperado'] = '00006';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $telefono='aaaaaaa';
        $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
        $arrayAux = $usuarios->Comprobar_telefono();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);


            // Comprobar los telefono es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'telefono';
    $USUARIOS_array_test1['error'] = 'Valor de atributo numérico demasiado corto';
    $USUARIOS_array_test1['codigo_esperado'] = '00004';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $telefono='12';
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    $arrayAux = $usuarios->comprobar_telefono();

    foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

        // Comprobar los telefono es mayor que el tamaño pedido
//--------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'telefono';
    $USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
    $USUARIOS_array_test1['codigo_esperado'] = '00002';
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';

    $telefono='12q34365476586792352346';
    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    $arrayAux = $usuarios->comprobar_telefono();

   foreach ($arrayAux as $error){
    if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
        $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
    }
}

if($USUARIOS_array_test1['resultado'] !== 'OK'){
    $USUARIOS_array_test1['resultado'] = 'FALSE';
    $USUARIOS_array_test1['codigo_obtenido'] = '-1';
}

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

     // Comprobar que el telefono no sea vacio
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'telefono';
    $USUARIOS_array_test1['error'] = 'Correcto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $telefono = '988000000';

    $usuarios = new USUARIOS_Model('','','','','',$telefono,'','','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->comprobar_telefono();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
 
}

//funcion que comprueba las validaciones del email
function comprobar_email(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el email no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'email';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $email = '';
    
        $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
        $arrayAux = $usuarios->Comprobar_email();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar el email es menor que el tamaño pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'email';
        $USUARIOS_array_test1['error'] = 'Valor de atributo no numérico demasiado corto';
        $USUARIOS_array_test1['codigo_esperado'] = '00003';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $email='a';
        $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
        $arrayAux = $usuarios->Comprobar_email();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
            // Comprobar el email es mayor que el tamaño pedido
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'email';
        $USUARIOS_array_test1['error'] = 'Valor de atributo demasiado largo';
        $USUARIOS_array_test1['codigo_esperado'] = '00002';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $email='aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
        $arrayAux = $usuarios->Comprobar_email();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    
                // Comprobar el email solo tiene caracteres alfabeticos
    //--------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'email';
        $USUARIOS_array_test1['error'] = 'Formato email erroneo';
        $USUARIOS_array_test1['codigo_esperado'] = '00120';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $email='234325';
        $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
        $arrayAux = $usuarios->Comprobar_email();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);


         // Comprobar que el email es correcto
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'email';
    $USUARIOS_array_test1['error'] = 'Correcto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $email = 'javo@uvigo.es';

    $usuarios = new USUARIOS_Model('','','','','','',$email,'','','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_email();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
}

//comrpueba que las validaciones en back del FechaNacimiento
function comprobar_FechaNacimiento(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el FechaNacimiento no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'Fecha Nacimiento';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $FechaNacimiento = '';
    
        $usuarios = new USUARIOS_Model('','','','','','','',$FechaNacimiento,'','');
        $arrayAux = $usuarios->Comprobar_FechaNacimiento();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar el FechaNacimiento tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'Fecha Nacimiento';
        $USUARIOS_array_test1['error'] = 'Formato fecha erróneo';
        $USUARIOS_array_test1['codigo_esperado'] = '00020';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $FechaNacimiento='a';
        $usuarios = new USUARIOS_Model('','','','','','','',$FechaNacimiento,'','');
        $arrayAux = $usuarios->Comprobar_FechaNacimiento();

        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

        // Comprobar que el FechaNacimiento es correcta
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'Fecha Nacimiento';
    $USUARIOS_array_test1['error'] = 'Correcta';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $FechaNacimiento = '1998-12-11';

    $usuarios = new USUARIOS_Model('','','','','','','',$FechaNacimiento,'','');
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_FechaNacimiento();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    

}

//comrpueba que las validaciones en back del sexo
function comprobar_sexo(){
    global $ERRORS_array_test_validaciones;
    // creo array de almacen de test individual
        $USUARIOS_array_test1 = array();
        $arrayAux = array();
    
    // Comprobar que el sexo no sea vacia
    //-------------------------------------------------------------------------------
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'sexo';
        $USUARIOS_array_test1['error'] = 'Atributo vacío';
        $USUARIOS_array_test1['codigo_esperado'] = '00001';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
        
        $sexo = '';
    
        $usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
        $arrayAux = $usuarios->Comprobar_sexo();
        
        foreach ($arrayAux as $error){
        if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
            $USUARIOS_array_test1['resultado'] = 'OK';
            $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
        }
    }
    
    if($USUARIOS_array_test1['resultado'] !== 'OK'){
        $USUARIOS_array_test1['resultado'] = 'FALSE';
        $USUARIOS_array_test1['codigo_obtenido'] = '-1';
    }
    
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
        
        // Comprobar el sexo tenga el formato pedido
    //-------------------------------------------------------------------------------
    
        $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
        $USUARIOS_array_test1['metodo'] = 'sexo';
        $USUARIOS_array_test1['error'] = "Solo se permiten los valores 'hombre','mujer'";
        $USUARIOS_array_test1['codigo_esperado'] = '00100';
        $USUARIOS_array_test1['codigo_obtenido'] = '';
        $USUARIOS_array_test1['resultado'] = '';
    
        $sexo='a';
        $usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
        $arrayAux = $usuarios->Comprobar_sexo();
        
        foreach ($arrayAux as $error){
            if($error['codigoincidencia']===$USUARIOS_array_test1['codigo_esperado']){
                $USUARIOS_array_test1['resultado'] = 'OK';
                $USUARIOS_array_test1['codigo_obtenido'] = $error['codigoincidencia'];
            }
        }
        
        if($USUARIOS_array_test1['resultado'] !== 'OK'){
            $USUARIOS_array_test1['resultado'] = 'FALSE';
            $USUARIOS_array_test1['codigo_obtenido'] = '-1';
        }
        array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);

        // Comprobar que el sexo correcto
    //-------------------------------------------------------------------------------
    $USUARIOS_array_test1['entidad'] = 'USUARIOS';	
    $USUARIOS_array_test1['metodo'] = 'sexo';
    $USUARIOS_array_test1['error'] = 'Correcto';
    $USUARIOS_array_test1['codigo_esperado'] = true;
    $USUARIOS_array_test1['codigo_obtenido'] = '';
    $USUARIOS_array_test1['resultado'] = '';
    
    $sexo = 'mujer';

    $usuarios = new USUARIOS_Model('','','','','','','','','',$sexo);
    $USUARIOS_array_test1['codigo_obtenido'] = $usuarios->Comprobar_sexo();

    if( $USUARIOS_array_test1['codigo_obtenido'] == $USUARIOS_array_test1['codigo_esperado']){
        $USUARIOS_array_test1['resultado'] = 'OK';
    }else{
        $USUARIOS_array_test1['resultado'] = 'FALSE';
    }

    array_push($ERRORS_array_test_validaciones, $USUARIOS_array_test1);
    

}
comprobar_login();
comprobar_password();
comprobar_nombre();
comprobar_DNI_usuarios();
comprobar_apellidos();
comprobar_telefono();
comprobar_email();
comprobar_FechaNacimiento();
comprobar_sexo();

?>