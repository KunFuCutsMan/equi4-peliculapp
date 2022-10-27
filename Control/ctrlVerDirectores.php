<?php
require_once 'Modelo/CDirector.php';

$arrPeliculasDeDirector = array();

if ( isset($_GET['label']) && $_GET['label'] == 5 ) {
	
	$c = 0;
	$direcID = 0;

	// Se mandó el director correctamente
	if ( isset($_POST['verDirectorId']) && $_POST['verDirectorId'] != 0 ) {
		$direcID = $_POST['verDirectorId'];
		$c++;
	}

	if ( $c >= 1 ) {
		$direc = new CDirector($direcID, '', '', 0);

		// Copia las películas hechas por el director para vst
		$arrPeliculasDeDirector = $direc->obtenPeliculasEnDB();
	}
}
?>