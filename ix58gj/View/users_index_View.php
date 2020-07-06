<?php
//Clase : Index
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
class Index {
	//constructor de la clase
	function __construct(){
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';//incluye el head
?>
		<H1> <?php echo $strings['BIENVENIDO A LA ARQUITECTURA BASE DE IU'];?> </H1>
		<BR>
<?php
		include '../View/Footer.php';
	}//fin del metodo render

}//fin  de index

?>