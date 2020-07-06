<?php
//Clase : MESSAGE
//Creado el : 10/10/2019
//Creado por: ix58gj
//-------------------------------------------------------
class MESSAGE{
	//declaración de variables
	private $string; 
	private $volver;

	function __construct($string, $volver){//constructor de la clase
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}

	function render(){

		include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<p>
		<H3>
<?php		
		echo $strings[$this->string];//mensaje que se le pasa
?>
		</H3>
		</p>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>"; //ruta a donde volver
		include '../View/Footer.php';
	} //fin metodo render

}//fin de MESSAGE
