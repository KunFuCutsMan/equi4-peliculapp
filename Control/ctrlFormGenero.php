<?php
require_once 'Modelo/CPeliculaGenero.php';

if ( isset($_GET['label']) && $_GET['label'] == 3 ) {
	
	$c = 0;
	$gen = "";

	if (isset($_POST['txtCategoGenero']) && !empty($_POST['txtCategoGenero'])) {
		$gen = $_POST['txtCategoGenero'];
		$c++;
	}

	if ($c >= 1) {
		// Crea y manda el género
		$Genero = new CPeliculaGenero(0, $gen);

		// Y envía si se pudo crear el género
		if ( $Genero->creaGeneroDB() ) {
			echo '<div class="msg-good">
			Si se pudo crear el género de película
			</div>';
		}
		else echo '<div class="msg-bad">
			Hubo un error al crear el género de la película
			</div>';
	}
}
?>