<script type="text/javascript">
//Archivo : validaciones.js
//Creado el : 28/10/2019
//Creado por: kn0l33
//Función: Validar los datos introducidos por el usuario en los formularios
//-------------------------------------------------------


/*Variable empleada para controlar el alert*/
//var avisado = false;

/*Comprueba si el campo es null o 0 y devuelve false, si existe algo devuelve true*/
function comprobarVacio( campo ) {
	if ( ( campo.value == null ) || ( campo.value.length == 0 ) ) {//comprueba si es null o 0
            campo.style.border = "2px solid red";
            return false;
	} else {//si existe algo devuelve true
            campo.style.border = "2px solid green";
            return true;
	}
}

/*Comprueba que sólo haya caracteres alfanuméricos*/
/*abc-es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabetico(campo, size) {
    var abc =/^\w{3,}$/;
    //var abc = /[aA-zZ]/;
	if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
	return false;
	}
	return true;
}

/*Comprueba que sólo haya caracteres alfanuméricos*/
/*abc-es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabetico2(campo, size) {
    var abc =/^\w*$/;
    //var abc = /[aA-zZ]/;
	if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
	return false;
	}
	return true;
}

/*Comprueba que el texto sea alfabético y que pueda tener espacios*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarTexto( campo, size ) {
	//var comprueba=/^[a-záéíóú]{1}[a-záéíóú ]*[a-záéíóú]$/i;
   
    var comprueba=/^(([a-zA-Z]|[ ]){3,})$/i;
	if(!comprobarExpresionRegular(campo,comprueba,size)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
		return false;
	}//envía true en caso contrario
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}

/*Comprueba que el texto sea alfabético y que pueda tener espacios*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarTexto2( campo, size ) {
	var comprueba=/([a-zA-Z]|[ ])*/i;
    
  // var comprueba = /^[A-Z]+\s*[A-Z]*\s*$/i;
	if(!comprobarExpresionRegular(campo,comprueba,size)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
		return false;
	}//envía true en caso contrario
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}
/*Comprueba que el texto sea alfabético y que pueda tener espacios y numero*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarDireccion(campo) {
	//var comprueba=/^[a-záéíóú]{1}[a-záéíóú ]*[a-záéíóú]$/i;
    
   // var comprueba = /^[A-Z]+\s*[A-Z]*\s*$/i;
   var comprueba = /^[a-zA-ZñÑÀ-ÿ0-9 ºª\-\/]{3,}$/i;
	if(!comprobarExpresionRegular(campo,comprueba,150)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
		return false;
	}//envía true en caso contrario
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}

/*Comprueba que el texto sea alfabético y que pueda tener espacios y numero*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarDireccion2(campo) {
	//var comprueba=/^[a-záéíóú]{1}[a-záéíóú ]*[a-záéíóú]$/i;
    
   // var comprueba = /^[A-Z]+\s*[A-Z]*\s*$/i;
   var comprueba = /^[a-zA-ZñÑÀ-ÿ0-9 ºª\-\/]*$/i;
	if(!comprobarExpresionRegular(campo,comprueba,150)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
		return false;
	}//envía true en caso contrario
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}

/*Comprueba si cumple la expresión reguladora enviada,si tiene valores diferentes al enviado devuelve false*/
function comprobarExpresionRegular(campo, exprreg, size) {
	if(!comprobarVacio(campo)){//si está vacío devuelve false
		return false;
	}
	else if ( exprreg.test( campo.value ) === false ) {//si no cumple la expresión regular devuelve false
            campo.style.border = "2px solid red";
            return false;
	}
	else if(!comprobarTamaño(campo,size)){//si es mayor que el tamaño indicado devuelve false
	return false;
	}//si cumple todas las condiciones devuelve true
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}

/*Comprueba que no se exceda el tamaño máximo*/
function comprobarTamaño( campo, size ) {
    if(!comprobarVacio(campo)){//si está vacío devuelve false
        return false;
    }
    else if ( campo.value.length > size ) {//si no está vacío devuelve false si excede el tamaño máximo
            campo.style.border = "2px solid red";
            return false;
    }//si está correcto el tamaño y no excede devuelve true
        else {
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba que el número real enviado está entre el valor menor y mayor, y que no sobreexceda los números decimales permitidos*/
/*Decimal-comprueba que el número enviado no sobreexceda los números decimales permitidos*/	
function comprobarReal(campo, numerodecimales, valormenor, valormayor) {
	var decimal= campo.value.substring( campo.value.indexOf('.' , ',')+ 1, campo.value.length);	
	
	if (!comprobarVacio(campo)){//comprueba si está vacío
		return false;
	}
	else if ( decimal.length > numerodecimales && decimal!=campo.value){//si el numero de decimales que tiene el dígito es mayor que el numero de decimales indicado produce un error//en el caso de que el numero que mandamos no haya decimales se cogerá el numero entero en decimal por eso debemos evitar esto
            campo.style.border = "2px solid red";		
            return false;
	}
        else if (campo.value < valormenor || campo.value > valormayor){//comprueba que le dígito enviado se haya entre sus valores menor y mayor
            campo.style.border = "2px solid red";
            return false;
	}
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}

//comprobamos un numero es entero que se situa entre dos campos
function comprobarEntero(campo, campomenor, campomayor){

    var value=campo.value;//variable que coje el valor correspondiente
    
    if (!comprobarVacio(campo)){//comprueba si está vacío
        return false;
    }
    //comprobamos si el campo está vacío o su longitud es 0 o es un espacio
    if(value == "" || value.length == 0 || /^\s+$/.test(value)  ){
        campo.style.border = "2px solid red";
        return false;
    }
    //comprobamos si el campo esta entre el mayor y el menor pasados por parámetros
    else if(value < campomenor || value > campomayor){
        campo.style.border = "2px solid red";
        return false;
    }
    else {
        campo.style.border = "2px solid green";
        return true;
    }

}

/*Comprueba que el telefono tenga un formato nacional o internacional*/
/*telef- permite comprobar que el teléfono tenga un formato de 9 dígitos, 34 y 9 dígitos, +34 y 9 dígitos o 0034 y 9 dígitos*/
function comprobarTelf( campo ) {
	var telef = /^(\+34|0034|34)?([0-9]){9}$/;
	if(!comprobarExpresionRegular(campo,telef,11)){//comprueba que la expresión enviada en telef sea cumplida por el campo enviado si no lo hace devuelve false
	return false;
	}
        else {
            campo.style.border = "2px solid green";
            return true;
	}
}

/*Comprueba si el DNI enviado está bien escrito*/
/*letras-Comprueba que la letra del DNI enviado es correcta*/
function comprobarDni(campo) {
	var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
	if(!comprobarVacio(campo)){//comprueba si está vacío
		return false;
	}
	else if( !(/^\d{8}[A-Z]$/.test(campo.value)) ) {//comrueba que el DNI esté formado por 8 digitos y una letra
                    campo.style.border = "2px solid red";		
                    return false;
		
	}
	else if(campo.value.charAt(8) != letras[(campo.value.substring(0, 8))%23]) {//en el caso de que tenga los 8 digitos y la letra comprueba que la letra sea correcta
                    campo.style.border = "2px solid red";		
                    return false;
	}
        campo.style.border = "2px solid green";
	return true;
}

function alwaysTrue(campo){
    campo.style.border = "2px solid green";
    return true;
}



//-------------------------validaciones de formularios-----------------------------------------------


/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarCentrosADD(Formu){
    var correcto=0;
        if(!comprobarExpresionRegular(Formu.CODCENTRO,/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/,10)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            
          abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarVacio(Formu.CODEDIFICIO)){//comprobamos que el codigo de edificio no sea vacio
            correcto = 1;
            Formu.CODEDIFICIO.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
        if(!comprobarTexto(Formu.NOMBRECENTRO, 50)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBRECENTRO.style.border = "2px solid red";
            
           abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarDireccion(Formu.DIRECCIONCENTRO)){//comprobamos que la dirección esté bien escrito
            correcto = 1;
            Formu.DIRECCIONCENTRO.style.border = "2px solid red";
            
           abrirModal('La direccion debe de ser solo letras');
        }
        if(!comprobarTexto(Formu.RESPONSABLECENTRO,60)){//comprobamos que el responsable no esté vacío
            correcto = 1;
            Formu.RESPONSABLECENTRO.style.border = "2px solid red";

            abrirModal('El nombre del responsable solo puede ser letras');
        }
	if(correcto==0){	
            return true;
        }		
	else{
            return false;
        }
	return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarCentrosEDIT(Formu){
     var correcto=0;
        if(!comprobarTexto(Formu.NOMBRECENTRO, 50)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBRECENTRO.style.border = "2px solid red";
           abrirModal('El nombre solo puede tener letras');
            
        }
        if(!comprobarDireccion(Formu.DIRECCIONCENTRO)){//comprobamos que la direccion esté bien escrito
            correcto = 1;
            Formu.DIRECCIONCENTRO.style.border = "2px solid red";
            abrirModal('La direccion debe de ser solo letras');
            
        }
        if(!comprobarTexto(Formu.RESPONSABLECENTRO,60)){//comprobamos que el responsable no esté vacío
            correcto = 1;
            Formu.RESPONSABLECENTRO.style.border = "2px solid red";
            abrirModal('El nombre del responsable solo puede ser letras');
            
        }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarCentrosSEARCH(Formu){
     var correcto=0;
         if(!comprobarExpresionRegular(Formu.CODCENTRO,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)&& comprobarVacio(Formu.CODCENTRO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
         if(!comprobarExpresionRegular(Formu.CODEDIFICIO,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10) && comprobarVacio(Formu.CODEDIFICIO)){//comprobamos que el codigo de edificio esté bien escrito
            correcto = 1;
            Formu.CODEDIFICIO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarTexto2(Formu.NOMBRECENTRO, 50) && comprobarVacio(Formu.NOMBRECENTRO)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBRECENTRO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
            
        }
        if(!comprobarDireccion2(Formu.DIRECCIONCENTRO) && comprobarVacio(Formu.DIRECCIONCENTRO)){//comprobamos que la direccion esté bien escrito
            correcto = 1;
            Formu.DIRECCIONCENTRO.style.border = "2px solid red";
            abrirModal('La direccion debe de ser solo letras');
            
        }
        if(!comprobarTexto2(Formu.RESPONSABLECENTRO,60) && comprobarVacio(Formu.RESPONSABLECENTRO)){//comprobamos que el responsable no esté vacío
            correcto = 1;
            Formu.RESPONSABLECENTRO.style.border = "2px solid red";
           abrirModal('El nombre del responsable solo puede ser letras');
            
        }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarUsuariosADD(Formu){
    var correcto=0;
    

	if(!comprobarExpresionRegular(Formu.login,/^([A-Za-z]{3,})$/,15)){//comprueba que el login esté correctamente escrito
            Formu.login.style.border = "2px solid red";		
            correcto=1;
            abrirModal('El login es vacio o tiene caracteres especiales');
           

	}
	else if(!comprobarExpresionRegular(Formu.password,/^([A-Za-z]{3,})$/,15)){//comprueba que el contraseña esté correctamente escrito
            Formu.password.style.border = "2px solid red";		
            correcto=1;
            abrirModal('La password es vacia o tiene caracteres especiales');
            
	}
	else if(!comprobarDni(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";		
            correcto=1;
           abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
           
	}
	else if(!comprobarTexto(Formu.nombre,30)){//comprueba que la nombre esté correctamente escrito
            Formu.nombre.style.border = "2px solid red";		
            correcto=1;
           abrirModal('El nombre solo puede tener letras');
           
	}  
	else if(!comprobarTexto(Formu.apellidos,50)){//comprueba que la apellidos esté correctamente escrito
            Formu.apellidos.style.border = "2px solid red";		
            correcto=1;
           abrirModal('Los apellidos solo pueden tener letras');
	}
	else if(!comprobarTelf(Formu.telefono)){//comprueba que el telefono esté correctamente escrito
            Formu.telefono.style.border = "2px solid red";		
            correcto=1;
           abrirModal('El telefono debe de ser nacional');
         
	}
	else if(!comprobarExpresionRegular(Formu.email,/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/,60)){//comprueba que el email esté correctamente escrito
            Formu.email.style.border = "2px solid red";		
            correcto=1;
           abrirModal('El emial tiene que tener @ y tener un dominio');
           
	}
    else if(!document.querySelector('input[name="sexo"]:checked')) {//comprueba que el sexo
        correcto=1;
        abrirModal('introduzca un sexo');
    }
    else if(!comprobarVacio(Formu.FechaNacimiento)){//comprueba que la fecha de nacimiento
            Formu.FechaNacimiento.style.border = "2px solid red";     
            correcto=1;
            abrirModal('fecha');
           
    }
   
    
    
	if(correcto==0){	
            return true;
        }		
	else{
            return false;
        }	
	

	return true;
}
/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarUsuariosEDIT(Formu){
    var correcto=0;
	if(!comprobarExpresionRegular(Formu.password,/^([A-Za-z]{3,})$/,15)){//comprueba que el contraseña esté correctamente escrito
            Formu.password.style.border = "2px solid red";		
            correcto=1;
            abrirModal('La password es vacia o tiene caracteres especiales');
	}
	if(!comprobarDni(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";		
            correcto=1;
            abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
	}
	if(!comprobarTexto(Formu.nombre,30)){//comprueba que la nombre esté correctamente escrito
            Formu.nombre.style.border = "2px solid red";		
            correcto=1;
             abrirModal('El nombre solo puede tener letras');
	}  
	if(!comprobarTexto(Formu.apellidos,50)){//comprueba que la apellidos esté correctamente escrito
            Formu.apellidos.style.border = "2px solid red";		
            correcto=1;
            abrirModal('Los apellidos solo pueden tener letras');
	}
	if(!comprobarTelf(Formu.telefono)){//comprueba que el telefono esté correctamente escrito
            Formu.telefono.style.border = "2px solid red";		
            correcto=1;
             abrirModal('El telefono debe de ser nacional');
	}
	if(!comprobarExpresionRegular(Formu.email,/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/,60)){//comprueba que el email esté correctamente escrito
            Formu.email.style.border = "2px solid red";		
            correcto=1;
            abrirModal('El emial tiene que tener @ y tener un dominio');
	}
    if(!document.querySelector('input[name="sexo"]:checked')) {//comprueba que el sexo
        correcto=1;
        abrirModal('introduzca un sexo');
      }
    else if(!comprobarVacio(Formu.FechaNacimiento)){//comprueba que la fecha de nacimiento
            Formu.FechaNacimiento.style.border = "2px solid red";     
            correcto=1;
            abrirModal('fecha');
           
        }
    
    
	if(correcto==0){	
            return true;
        }		
	else{
            return false;
        }	
	

	return true;
}
/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarUsuariosSEARCH(Formu){
     var correcto=0;
    

    if(!comprobarExpresionRegular(Formu.login,/^([A-Za-z]*)$/,15) && comprobarVacio(Formu.login)){//comprueba que el login esté correctamente escrito
            Formu.login.style.border = "2px solid red";     
            correcto=1;
            abrirModal('El login es vacio o tiene caracteres especiales');
           

    }
    else if(!comprobarExpresionRegular(Formu.password,/^([A-Za-z]*)$/,15) && comprobarVacio(Formu.password)){//comprueba que el contraseña esté correctamente escrito
            Formu.password.style.border = "2px solid red";      
            correcto=1;
            abrirModal('La password es vacia o tiene caracteres especiales');
            
    }
    else if(!comprobarAlfabetico2(Formu.DNI,9)&&comprobarVacio(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";       
            correcto=1;
           abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
           
    }
    else if(!comprobarTexto2(Formu.nombre,30)&&comprobarVacio(Formu.nombre)){//comprueba que la nombre esté correctamente escrito
            Formu.nombre.style.border = "2px solid red";        
            correcto=1;
           abrirModal('El nombre solo puede tener letras');
           
    }  
    else if(!comprobarTexto2(Formu.apellidos,50)&&comprobarVacio(Formu.apellidos)){//comprueba que la apellidos esté correctamente escrito
            Formu.apellidos.style.border = "2px solid red";     
            correcto=1;
           abrirModal('Los apellidos solo pueden tener letras');
    }
    else if(!comprobarExpresionRegular(Formu.telefono,/[0-9]*/,11)&&comprobarVacio(Formu.telefono)){//comprueba que el telefono esté correctamente escrito
            Formu.telefono.style.border = "2px solid red";      
            correcto=1;
           abrirModal('El telefono debe de ser nacional');
         
    }
    else if(!comprobarAlfabetico2(Formu.email,60)&&comprobarVacio(Formu.email)){//comprueba que el email esté correctamente escrito
            Formu.email.style.border = "2px solid red";     
            correcto=1;
           abrirModal('El emial tiene que tener @ y tener un dominio');
           
    }
    else if(!comprobarAlfabetico2(Formu.fotopersonal,50)&&comprobarVacio(Formu.fotopersonal)){//comprueba que la foto no se vacia
            Formu.fotopersonal.style.border = "2px solid red";     
            correcto=1;
            abrirModal('demasiado');
           
    }
   
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }   
    

    return true;
}
/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarEdificoADD(Formu){
    var correcto=0;
        if(!comprobarExpresionRegular(Formu.CODEDIFICIO,/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/,10)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODEDIFICIO.style.border = "2px solid red";
            abrirModal("Los codigos deben estar formados por letras y numeros2");
        }
        if(!comprobarTexto(Formu.NOMBREEDIFICIO, 50)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBREEDIFICIO.style.border = "2px solid red";
            abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarDireccion(Formu.DIRECCIONEDIFICIO, 150)){//comprobamos que la dirección esté bien escrito
            correcto = 1;
            Formu.DIRECCIONEDIFICIO.style.border = "2px solid red";
            abrirModal('La direccion debe de ser solo letras');
        }
        if(!comprobarAlfabetico(Formu.CAMPUSEDIFICIO,10)){//comprobamos que el campus no esté vacío
            correcto = 1;
            Formu.CAMPUSEDIFICIO.style.border = "2px solid red";
            abrirModal('El campus solo puede ser letras');
        }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarEdificoEDIT(Formu){
    var correcto=0;
        
        if(!comprobarTexto(Formu.NOMBREEDIFICIO, 50)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBREEDIFICIO.style.border = "2px solid red";
            abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarDireccion(Formu.DIRECCIONEDIFICIO, 150)){//comprobamos que la dirección esté bien escrito
            correcto = 1;
            Formu.DIRECCIONEDIFICIO.style.border = "2px solid red";
            abrirModal('La direccion debe de ser solo letras');
        }
        if(!comprobarAlfabetico(Formu.CAMPUSEDIFICIO,10)){//comprobamos que el campus no esté vacío
            correcto = 1;
            Formu.CAMPUSEDIFICIO.style.border = "2px solid red";
            abrirModal('El campus solo puede ser letras');
        }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarEdificoSEARCH(Formu){
    var correcto=0;
        
        if(!comprobarExpresionRegular(Formu.CODEDIFICIO,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)&&comprobarVacio(Formu.CODEDIFICIO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODEDIFICIO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarTexto2(Formu.NOMBREEDIFICIO, 50)&&comprobarVacio(Formu.NOMBREEDIFICIO)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBREEDIFICIO.style.border = "2px solid red";
            abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarDireccion2(Formu.DIRECCIONEDIFICIO, 150)&&comprobarVacio(Formu.DIRECCIONEDIFICIO)){//comprobamos que la dirección esté bien escrito
            correcto = 1;
            Formu.DIRECCIONEDIFICIO.style.border = "2px solid red";
            abrirModal('La direccion debe de ser solo letras');
        }
        if(!comprobarAlfabetico2(Formu.CAMPUSEDIFICIO,10)&&comprobarVacio(Formu.CAMPUSEDIFICIO)){//comprobamos que el campus no esté vacío
            correcto = 1;
            Formu.CAMPUSEDIFICIO.style.border = "2px solid red";
            abrirModal('El campus solo puede ser letras');
        }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarEspacioADD(Formu){
    var correcto=0;
        if(!comprobarExpresionRegular(Formu.CODESPACIO,/^(([a-z]|[A-Z]|[0-9]|[-]){3,})$/,10)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODESPACIO.style.border = "2px solid red";
             abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarVacio(Formu.CODCENTRO)){//comprobamos que el codigo de centro
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
        if(!comprobarVacio(Formu.CODEDIFICIO)){//comprobamos que el codigo de edificio no sea vacio
            correcto = 1;
            Formu.CODEDIFICIO.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
        if(!comprobarEntero(Formu.SUPERFICIEESPACIO,1,9999)){//comprobamos que la superficie esté bien escrito
            correcto = 1;
            Formu.SUPERFICIEESPACIO.style.border = "2px solid red";
             abrirModal('La superficie tiene que ser un numero entre 1 y 100');
        }
        if(!comprobarEntero(Formu.NUMINVENTARIOESPACIO,1,99999999)){//comprobamos que el número de inventario esté bien escrito
            correcto = 1;
            Formu.NUMINVENTARIOESPACIO.style.border = "2px solid red";
             abrirModal('El inventario tiene que estar entre 1 y 100');
        }
        if(!document.querySelector('input[name="TIPO"]:checked')) {//comprueba que el sexo
        correcto=1;
        abrirModal('introduzca un tipo');
      }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarEspacioEDIT(Formu){
    var correcto=0;
        if(!comprobarEntero(Formu.SUPERFICIEESPACIO,1,9999)){//comprobamos que la superficie esté bien escrito
            correcto = 1;
            Formu.SUPERFICIEESPACIO.style.border = "2px solid red";
             abrirModal('La superficie tiene que ser un numero entre 1 y 100');
        }
        if(!comprobarEntero(Formu.NUMINVENTARIOESPACIO,1,99999999)){//comprobamos que el número de inventario esté bien escrito
            correcto = 1;
            Formu.NUMINVENTARIOESPACIO.style.border = "2px solid red";
             abrirModal('El inventario tiene que estar entre 1 y 100');
        }
        if(!document.querySelector('input[name="TIPO"]:checked')) {//comprueba que el sexo
        correcto=1;
        abrirModal('introduzca un tipo');
      }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarEspacioSEARCH(Formu){
    var correcto=0;
        if(!comprobarExpresionRegular(Formu.CODESPACIO,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)&&comprobarVacio(Formu.CODESPACIO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODESPACIO.style.border = "2px solid red";
             abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarExpresionRegular(Formu.CODCENTRO,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)&&comprobarVacio(Formu.CODCENTRO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarExpresionRegular(Formu.CODEDIFICIO,/^(([a-z]|[A-Z]|[0-9]|[-])*)$/,10)&&comprobarVacio(Formu.CODEDIFICIO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODEDIFICIO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarEntero(Formu.SUPERFICIEESPACIO,1,9999)&&comprobarVacio(Formu.SUPERFICIEESPACIO)){//comprobamos que la superficie esté bien escrito
            correcto = 1;
            Formu.SUPERFICIEESPACIO.style.border = "2px solid red";
             abrirModal('La superficie tiene que ser un numero entre 1 y 100');
        }
        if(!comprobarEntero(Formu.NUMINVENTARIOESPACIO,1,99999999)&&comprobarVacio(Formu.NUMINVENTARIOESPACIO)){//comprobamos que el número de inventario esté bien escrito
            correcto = 1;
            Formu.NUMINVENTARIOESPACIO.style.border = "2px solid red";
             abrirModal('El inventario tiene que estar entre 1 y 100');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfTitulacion(Formu){
    var correcto=0;
    if(!comprobarVacio(Formu.DNI)){//comprobamos el dni
            correcto = 1;
            Formu.DNI.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
        if(!comprobarVacio(Formu.CODTITULACION)){//comprobamos el codigo de titulacion
            correcto = 1;
            Formu.CODTITULACION.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
        if(!comprobarExpresionRegular(Formu.ANHOACADEMICO,/[0-9]{4}[-][0-9]{4}/,9)){//comprobamos que el año académico esté bien escrito
            correcto = 1;
            Formu.ANHOACADEMICO.style.border = "2px solid red";
            abrirModal('El año academico debe de ser letras y numeros');
        }
       

    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfTitulacionSEARCH(Formu){
    var correcto=0;
         if(!comprobarAlfabetico2(Formu.DNI,9)&&comprobarVacio(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";       
            correcto=1;
             abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
        }
        if(!comprobarAlfabetico2(Formu.CODTITULACION, 10)&&comprobarVacio(Formu.CODTITULACION)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODTITULACION.style.border = "2px solid red";
             abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarExpresionRegular(Formu.ANHOACADEMICO,/[0-9]{4}[-][0-9]{4}|[0-9]/,9)&&comprobarVacio(Formu.ANHOACADEMICO)){//comprobamos que el año académico esté bien escrito
            correcto = 1;
            Formu.ANHOACADEMICO.style.border = "2px solid red";
            abrirModal('El año academico debe de ser letras y numeros');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfEspacio(Formu){
    var correcto=0;
    if(!comprobarVacio(Formu.DNI)){//comprobamos el dni
            correcto = 1;
            Formu.DNI.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
    if(!comprobarVacio(Formu.CODESPACIO)){//comprobamos que el codigo
        correcto = 1;
        Formu.CODESPACIO.style.border = "2px solid red";
        
        abrirModal('entidad fuerte');
    }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfEspacioSEARCH(Formu){
    var correcto=0;
        if(!comprobarAlfabetico2(Formu.DNI,9)&&comprobarVacio(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";       
            correcto=1;
            abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
        }
        
        if(!comprobarExpresionRegular(this,/[aA-zZ]|[0-9]|[-]/,10)&&comprobarVacio(Formu.CODESPACIO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODESPACIO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}
/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfesorADD(Formu){
    var correcto=0;
    
    if(!comprobarDni(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";       
            correcto=1;
            
            abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
    }
    if(!comprobarTexto(Formu.NOMBREPROFESOR,15)){//comprueba que la nombre esté correctamente escrito
            Formu.NOMBREPROFESOR.style.border = "2px solid red";        
            correcto=1;
            
            abrirModal('El nombre solo puede tener letras');
    }  
    if(!comprobarTexto(Formu.APELLIDOSPROFESOR,30)){//comprueba que la apellidos esté correctamente escrito
            Formu.APELLIDOSPROFESOR.style.border = "2px solid red";     
            correcto=1;
            
            abrirModal('Los apellidos solo pueden tener letras');
    }
    if(!comprobarTexto(Formu.AREAPROFESOR,60)){//comprueba que la area esté correctamente escrito
            Formu.AREAPROFESOR.style.border = "2px solid red";     
            correcto=1;
           
            abrirModal('El area solo puede ser letras'); 
    }
   if(!comprobarTexto(Formu.DEPARTAMENTOPROFESOR,60)){//comprueba que lel departamento esté correctamente escrito
            Formu.DEPARTAMENTOPROFESOR.style.border = "2px solid red";     
            correcto=1;
            
            abrirModal('El departamento solo puede ser letras');
    }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }   
    

    return true;


}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfesorEDIT(Formu){
    var correcto=0;
    if(!comprobarTexto(Formu.NOMBREPROFESOR,15)){//comprueba que la nombre esté correctamente escrito
            Formu.NOMBREPROFESOR.style.border = "2px solid red";        
            correcto=1;
            
            abrirModal('El nombre solo puede tener letras');
    }  
    if(!comprobarTexto(Formu.APELLIDOSPROFESOR,30)){//comprueba que la apellidos esté correctamente escrito
            Formu.APELLIDOSPROFESOR.style.border = "2px solid red";     
            correcto=1;
            
            abrirModal('Los apellidos solo pueden tener letras');
    }
    if(!comprobarTexto(Formu.AREAPROFESOR,60)){//comprueba que la area esté correctamente escrito
            Formu.AREAPROFESOR.style.border = "2px solid red";     
            correcto=1;
           
            abrirModal('El area solo puede ser letras'); 
    }
   if(!comprobarTexto(Formu.DEPARTAMENTOPROFESOR,60)){//comprueba que lel departamento esté correctamente escrito
            Formu.DEPARTAMENTOPROFESOR.style.border = "2px solid red";     
            correcto=1;
            
            abrirModal('El departamento solo puede ser letras');
    }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }   
    

    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarProfesorSEARCH(Formu){
    var correcto=0;
    
    if(!comprobarAlfabetico2(Formu.DNI,9)&&comprobarVacio(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";       
            correcto=1;
            
            abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
    }
    if(!comprobarTexto2(Formu.NOMBREPROFESOR,15)&&comprobarVacio(Formu.NOMBREPROFESOR)){//comprueba que la nombre esté correctamente escrito
            Formu.NOMBREPROFESOR.style.border = "2px solid red";        
            correcto=1;
            
            abrirModal('El nombre solo puede tener letras');
    }  
    if(!comprobarTexto2(Formu.APELLIDOSPROFESOR,30)&&comprobarVacio(Formu.APELLIDOSPROFESOR)){//comprueba que la apellidos esté correctamente escrito
            Formu.APELLIDOSPROFESOR.style.border = "2px solid red";     
            correcto=1;
            
            abrirModal('Los apellidos solo pueden tener letras');
    }
    if(!comprobarTexto2(Formu.AREAPROFESOR,60)&&comprobarVacio(Formu.AREAPROFESOR)){//comprueba que la area esté correctamente escrito
            Formu.AREAPROFESOR.style.border = "2px solid red";     
            correcto=1;
           
            abrirModal('El area solo puede ser letras'); 
    }
   if(!comprobarTexto2(Formu.DEPARTAMENTOPROFESOR,60)&&comprobarVacio(Formu.DEPARTAMENTOPROFESOR)){//comprueba que lel departamento esté correctamente escrito
            Formu.DEPARTAMENTOPROFESOR.style.border = "2px solid red";     
            correcto=1;
            
            abrirModal('El departamento solo puede ser letras');
    }
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }   
    

    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarTitulacionADD(Formu){
    var correcto=0;
        if(!comprobarAlfabetico(Formu.CODTITULACION, 10)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODTITULACION.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros');
        }
        if(!comprobarVacio(Formu.CODCENTRO)){//comprobamos que el codigo de centro
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            
          abrirModal('entidad fuerte');
        }
        if(!comprobarTexto(Formu.NOMBRETITULACION,50)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBRETITULACION.style.border = "2px solid red";
            abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarTexto(Formu.RESPONSABLETITULACION,60)){//comprobamos que el responsable  esté bien escrito
            correcto = 1;
            Formu.RESPONSABLETITULACION.style.border = "2px solid red";
            abrirModal('El nombre del responsable solo puede ser letras');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarTitulacionEDIT(Formu){
    var correcto=0;
        if(!comprobarVacio(Formu.CODCENTRO)){//comprobamos que el codigo de centro
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            
            abrirModal('entidad fuerte');
        }
        if(!comprobarTexto(Formu.NOMBRETITULACION,50)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBRETITULACION.style.border = "2px solid red";
            abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarTexto(Formu.RESPONSABLETITULACION,60)){//comprobamos que el responsable  esté bien escrito
            correcto = 1;
            Formu.RESPONSABLETITULACION.style.border = "2px solid red";
            abrirModal('El nombre del responsable solo puede ser letras');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarTitulacionSEARCH(Formu){
    var correcto=0;
        if(!comprobarAlfabetico2(Formu.CODTITULACION, 10)&&comprobarVacio(Formu.CODTITULACION)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODTITULACION.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros');
        }
        if(!comprobarExpresionRegular(this,/[a-z]|[A-Z]|[0-9]|[-]/,10)&&comprobarVacio(Formu.CODCENTRO)){//comprobamos que el codigo esté bien escrito
            correcto = 1;
            Formu.CODCENTRO.style.border = "2px solid red";
            abrirModal('Los codigos deben estar formados por letras y numeros2');
        }
        if(!comprobarTexto2(Formu.NOMBRETITULACION,50)&&comprobarVacio(Formu.NOMBRETITULACION)){//comprobamos que el nombre esté bien escrito
            correcto = 1;
            Formu.NOMBRETITULACION.style.border = "2px solid red";
            abrirModal('El nombre solo puede tener letras');
        }
        if(!comprobarTexto2(Formu.RESPONSABLETITULACION,60)&&comprobarVacio(Formu.RESPONSABLETITULACION)){//comprobamos que el responsable  esté bien escrito
            correcto = 1;
            Formu.RESPONSABLETITULACION.style.border = "2px solid red";
            abrirModal('El nombre del responsable solo puede ser letras');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarLogin(Formu){
    var correcto=0;
       
        if(!comprobarExpresionRegular(Formu.login,/^([A-Za-z]{3,})$/,15)){//comprobamos que el login esté bien escrito
            correcto = 1;
            Formu.login.style.border = "2px solid red";
            abrirModal('El login es vacio o tiene caracteres especiales');
        }
        if(!comprobarExpresionRegular(Formu.password,/^([A-Za-z]{3,})$/,15)){//comprobamos que la contraseña  esté bien escrito
            correcto = 1;
            Formu.password.style.border = "2px solid red";
            abrirModal('La password es vacia o tiene caracteres especiales');
        }
       
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }
    return true;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en el formulario */
/*En el momento que correcto sea 1 significará que algún campo no es correcto*/
function validarRegistro(Formu){
    var correcto=0;
    if(!comprobarExpresionRegular(Formu.login,/^([A-Za-z]{3,})$/,15)){//comprueba que el login esté correctamente escrito
            Formu.login.style.border = "2px solid red";     
            correcto=1;
            abrirModal('El login es vacio o tiene caracteres especiales');
           

    }
    else if(!comprobarExpresionRegular(Formu.password,/^([A-Za-z]{3,})$/,15)){//comprueba que el contraseña esté correctamente escrito
            Formu.password.style.border = "2px solid red";      
            correcto=1;
            abrirModal('La password es vacia o tiene caracteres especiales');
            
    }
    else if(!comprobarDni(Formu.DNI)){//comprueba que el DNI esté correctamente escrito
            Formu.DNI.style.border = "2px solid red";       
            correcto=1;
           abrirModal('El DNI tiene que tener 8 numeros y 1 letra');
           
    }
    else if(!comprobarAlfabetico(Formu.nombre,30)){//comprueba que la nombre esté correctamente escrito
            Formu.nombre.style.border = "2px solid red";        
            correcto=1;
           abrirModal('El nombre solo puede tener letras');
           
    }  
    else if(!comprobarTexto(Formu.apellidos,50)){//comprueba que la apellidos esté correctamente escrito
            Formu.apellidos.style.border = "2px solid red";     
            correcto=1;
           abrirModal('Los apellidos solo pueden tener letras');
    }
    else if(!comprobarTelf(Formu.telefono)){//comprueba que el telefono esté correctamente escrito
            Formu.telefono.style.border = "2px solid red";      
            correcto=1;
           abrirModal('El telefono debe de ser nacional');
         
    }
    else if(!comprobarExpresionRegular(Formu.email,/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,4})+$/,60)){//comprueba que el email esté correctamente escrito
            Formu.email.style.border = "2px solid red";     
            correcto=1;
           abrirModal('El emial tiene que tener @ y tener un dominio');
           
    }
    else if(!document.querySelector('input[name="sexo"]:checked')) {//comprueba que el sexo
        correcto=1;
        abrirModal('introduzca un sexo');
    }

    
    else if(!comprobarVacio(Formu.FechaNacimiento)){//comprueba que la fecha de nacimiento
            Formu.FechaNacimiento.style.border = "2px solid red";     
            correcto=1;
            abrirModal('fecha');
           
    }
   
    if(correcto==0){    
            return true;
        }       
    else{
            return false;
        }   
    

    return true;
}

/*
     * Función: cerrarModal()
     * Descripción: cierra el modal
     */
function cerrarModal() {
        document.getElementById("modal").style.display = "none";
    }

    /*
     * Función: abrirModal(texto)
     * Descripción: abre el modal mostrando el texto correspondiente
     */

    function abrirModal(texto) {
        var idioma_sesion = sessionStorage.getItem('idioma');
        var mensaje;
        if (idioma_sesion === 'SPANISH') { //si el idioma se sesion es el español
            mensaje=español[texto];
        } else if (idioma_sesion === 'ENGLISH') {//si el idioma se sesion es el ingles
            mensaje=english[texto];
        } else if (idioma_sesion === 'GALLAECIAN') {//si el idioma se sesion es el gallego
            mensaje=galego[texto];
        }
        document.getElementById("modal").style.display = "block";
        document.getElementById("mensajeError").innerHTML = mensaje;
        document.getElementById("cerrar").focus();
    }

</script>