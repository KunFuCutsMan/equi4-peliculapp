<?php
require_once 'Modelo/CPais.php';
require_once 'Modelo/CDirector.php';
require_once 'Modelo/CActor.php';
require_once 'Modelo/CPelicula.php';
require_once 'Modelo/CPeliculaGenero.php';

function print_r2($var)
{
	echo "<pre>";
	echo print_r($var);
	echo "</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PeliculAPP - Equipo 4</title>
	<link rel="stylesheet" type="text/css" href="Estilos/estilos.css">
	<link rel="stylesheet" type="text/css" href="Estilos/pestanas.css">
	<link rel="stylesheet" type="text/css" href="Estilos/formularios.css">

	<script type="text/javascript" src="main.js" defer></script>
</head>
<body>
	<main>
		<h1>PeliculAPP</h1>
		<p>Bienvenido a PeliculAPP, puede empezar al ingresar algunos actores
		y directores, así como algunas categorías para registrar películas</p>

		<?php require 'Vistas/vstPestanaFrame.php'; ?>
	</main>
</body>
</html>