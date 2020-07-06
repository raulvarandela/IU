<?php
//Clase : users_index_View.php
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: Sirve como página de bienvenida
//-------------------------------------------------------
class Index {
	//constructor de la clase
	function __construct(){
		$this->render(); //función render
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';//incluye el head
?>
		<div class="div_contenido">
			<H1> <label id='BIENVENIDO A LA ARQUITECTURA BASE DE IU'><?php echo $strings['BIENVENIDO A LA ARQUITECTURA BASE DE IU'];?></label> </H1>
		</div>

		<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>TUTORIAL</h2>
      <p>Bienvenido a la arquitectura base de iu, en  este corto tutorial le voy a explicar de forma resumida el funcionamiento de esta página web, empecemos. Pero antes recuerda hacer un chmod 777 de directorio Files para que te permita subir fotos al servidor. </p>

     
          <img src="../View/img/a.png"  style="width:80%;">
        
     
     <p> </p>
      
      <p>El la parte de arriba nos encontramos el título de la página, los botones para cambiar entre los 3 idiomas (inglés, español y gallego), un texto que indica que usuario está identificado y un botón para salir.Para cambiar de idioma basta con pulsar uno de los iconos redondos para que cambie de idioma, una vez pulsados se recargará la página y toda la interfaz estará traducida. Al lado de los botones de cambiar de idioma tenemos un texto que nos indica que usuario estamos usando; en el caso de que estemos en la página de login este texto está substituido por un botón que permite registrar nuevos usuarios (icono con un usuario y un mas). Y para acabar con la parte superior tenemos un icono con forma de puerta para terminar la sesión actual. Pulsando encima se cierra la sesión y aparecerá la vista de login.</p>
    </div>
    <div class="card">
      <img src="../View/img/b.png"  style="width:80%;">
      <br>
      <p> </p>
      <p>En el menú nos encontramos la gestión de todas las entidades. Haciendo click sobre una de ellas nos lleva el espacio de trabajo correspondiente. En este espacio de trabajo nos encontraremos un título que nos indica con que entidad estamos trabajando y un subtítulo que nos indica que acción estamos realizando. A continuación veremos con más detalle el espacio de trabajo. </p>
    </div>
    <div class="card">
      <img src="../View/img/c.png" style="width:50%;">
      
      <p>Y por último tenemos el espacio de trabajo. Nos encontramos con una tabla donde nos muestra todas las tuplas de esa entidad con unos pocos atributos.Si queremos ver toda la información de la tupla se le tiene que dar al botón de detalles (el icono del documento). Para editar una tupla se le tiene que dar al botón de editar (el icono del lápiz). Para eliminar una tupla, tenemos el botón de eliminar (icono de la basura).Si se quiere añadir una tupla, en la parte superior de la tabla hay un icono con un mas, haciendo click se mostrará un formulario para introducir los diferentes campos, una vez cubierto el formulario se le da ADD y ya se habrá añadido la nueva tupla. Por último al lado del botón de añadir hay un icono con una lupa; este icono sirve para buscar tuplas donde se muestra un formulario para introducir datos. Una vez cubiertos se le da a SEARCH y se mostrará el resultado de tu búsqueda.</p>
    </div>
  </div>

  


  </div>
  
</div>

<?php
		include '../View/Footer.php';
	}//fin del metodo render

}//fin  de index

?>