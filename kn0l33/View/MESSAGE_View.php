<?php
//Clase : MESSAGE
//Creado el : 10/10/2019
//Creado por: kn0l33
//Función: mensage que se muestra después de una operación
//-------------------------------------------------------
class MESSAGE{
	//declaración de variables
	private $string; //cadena de texto que se va a mostrar
	private $volver; //a donde tiene que volver después de mostrar el mensaje

	function __construct($string, $volver){//constructor de la clase
		$this->string = $string;//mensaje que se le pasa
		$this->volver = $volver;//direccion a donde volver
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
		<?php if(is_string($this->string)){ ?>
			<label id='<?php echo $this->string ?>'> <?php echo $strings[$this->string];?></label>
		<?php }else{
			foreach ($this->string as $error){ ?>
				<br>
				<?php echo $error['nombreatributo'] .' : ' .$error['mensajeerror'] ;?>
				<br>
		<?php	}
		}?>
		</H3>
		</p>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'>" . "<img src='../View/Icons/volver.png' width='20' height='20'>" . " </a>"; //ruta a donde volver
		include '../View/Footer.php';
	} //fin metodo render

}//fin de MESSAGE
