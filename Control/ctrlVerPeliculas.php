<?php
require_once 'Modelo/CPelicula.php';

$arrInfoPelicula = array();

if ( isset($_GET['label']) && $_GET['label'] == 6 ) {
	
	$c = 0;
	$peliID = 0;

	// Se mandó la película correctamente
	if ( isset($_POST['verPeliculaID']) && $_POST['verPeliculaID'] != 0 ) {
		$peliID = $_POST['verPeliculaID'];
		$c++;
	}

	if ( $c >= 1 ) {
		$peli = new CPelicula($peliID, '', 0);

		// Copia el registro de la película para la vista
		$arrInfoPelicula = $peli->obtenRegistroEnDB();
	}
}
?>