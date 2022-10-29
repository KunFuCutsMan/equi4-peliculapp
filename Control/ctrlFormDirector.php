<?php
require_once 'Modelo/CDirector.php';

if ( isset($_GET['label']) && $_GET['label'] == 1 ) {
	
	$c = 0;
	$nom = "";
	$ap1 = "";
	$ap2 = "";
	$pai = 0;

	if (isset($_POST['txtDirectorNombre']) &&
		!empty($_POST['txtDirectorNombre'])) {
		$nom = $_POST['txtDirectorNombre'];
		$c++;
	}

	if (isset($_POST['txtDirectorApe1ro']) &&
		!empty($_POST['txtDirectorApe1ro'])) {
		$ap1 = $_POST['txtDirectorApe1ro'];
		$c++;
	}

	if (isset($_POST['txtDirectorApe2do']) &&
		!empty($_POST['txtDirectorApe2do'])) {
		$ap2 = $_POST['txtDirectorApe2do'];
	}

	if (isset($_POST['slcDirectorPais']) && $_POST['slcDirectorPais'] > 0) {
		$pai = $_POST['slcDirectorPais'];
		$c++;
	}

	if ( $c >= 3 ) {
		// Crea y manda el director
		$Director = new CDirector(0, $nom, $ap1, $pai);
		$Director->setApeSegundo($ap2);

		// Checa si no existe el director
		if ( !$Director->existeEnDB() ) {
			if ( $Director->creaDirectorDB() ) {
				echo '<div class="msg-good">
				Si se pudo crear el Director
				</div>';
			} else {
				echo '<div class="msg-bad">
				Hubo un error al crear el director
				</div>';
			}
			
		}
	}

}
?>