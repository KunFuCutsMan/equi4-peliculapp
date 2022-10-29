<?php
require_once 'Modelo/CActor.php';

if ( isset($_GET['label']) && $_GET['label'] == 2 ) {
	
	$c = 0;
	$nom = "";
	$ap1 = "";
	$ap2 = "";
	$pai = 0;

	if (isset($_POST['txtActorNombre']) && !empty($_POST['txtActorNombre'])) {
		$nom = $_POST['txtActorNombre'];
		$c++;
	}

	if (isset($_POST['txtActorApe1ro']) && !empty($_POST['txtActorApe1ro'])) {
		$ap1 = $_POST['txtActorApe1ro'];
		$c++;
	}

	if (isset($_POST['txtActorApe2do']) &&
		!empty($_POST['txtActorApe2do'])) {
		$ap2 = $_POST['txtActorApe2do'];
	}

	if (isset($_POST['slcActorPais']) && $_POST['slcActorPais'] > 0) {
		$pai = $_POST['slcActorPais'];
		$c++;
	}

	if ($c >= 3) {
		// Crea y manda el actor
		$Actor = new CActor(0, $nom, $ap1, $pai);
		$Actor->setApeSegundo($ap2);

		// Checa si no existe el actor
		if ( !$Actor->existeEnDB() ) {
			if ( $Actor->creaActorDB() ) {
				echo '<div class="msg-good">
				Si se pudo crear el Actor
				</div>';
			}
			else echo '<div class="msg-bad">
				Hubo un error al crear el Actor
				</div>';
		}
	}
}
?>