<?php
require_once 'Modelo/CPelicula.php';

if ( isset($_GET['label']) && $_GET['label'] == 4 ) {

	$c = 0;
	$nom = "";
	$gen = 0;
	$dire = array();
	$acts = array();

	// El nombre existe y no es vacío
	if ( isset($_POST['slcPeliNombre']) && !empty( $_POST['slcPeliNombre'] ) ) {
		$nom = $_POST['slcPeliNombre'];
		$c++;
	}

	// Existe el genero y no se escogió la opción defult
	if ( isset($_POST['slcPeliGenero']) && $_POST['slcPeliGenero'] != 0 ) {
		$gen = $_POST['slcPeliGenero'];
		$c++;
	}

	// Se escogió almenos un director que no sea opción default
	if ( isset($_POST['slcPeliDirector']) && $_POST['slcPeliDirector'][0]!=0 ) {
		$dire = $_POST['slcPeliDirector'];
		$c++;
	}

	// Se escogió almenos un actor que no sea opción default
	if ( isset($_POST['slcPeliActores']) && $_POST['slcPeliActores'][0]!=0 ) {
		$acts = $_POST['slcPeliActores'];
		$c++;
	}

	if ( $c >= 4 ) {
		// Crea y manda la película
		$Pelicula = new CPelicula(0, $nom, $gen);

		// ¿No existe la película?
		if ( !$Pelicula->existeEnDB() ) {

			// Manda si se pudo mandar la película
			if ( $Pelicula->creaPeliculaDB() ) {
				echo '<div class="msg-good">
				Si se pudo crear la película
				</div>';
			}
			else echo '<div class="msg-bad">
				Hubo un error al crear la película
				</div>';

			// Obten la ID de la pelicula insertada
			$Pelicula->setID( $Pelicula->getIDfromDB() );

			// Entonces crea las relaciones de los actores
			if ( $Pelicula->creaRelacionActor($acts) ) {
				echo '<div class="msg-good">
				Si se pudo crear las relaciones con los actores
				</div>';
			}
			else echo '<div class="msg-bad">
				Hubo un error al crear las relaciones con los actores
				</div>';

			// Entonces crea las relaciones de los directores
			if ( $Pelicula->creaRelacionDirector($dire) ) {
				echo '<div class="msg-good">
				Si se pudo crear las relaciones con los directores
				</div>';
			}
			else echo '<div class="msg-bad">
				Hubo un error al crear las relaciones con los directores
				</div>';

		}
		else echo '<div class="msg-bad">
			La película ya se encuentra registrada
			</div>';
	}
}

?>