<?php
	// Obten el label que se dejó abierto
	$lbl = 1;
	if (isset($_GET['label']) && !empty($_GET['label'])) {
		$lbl = $_GET['label'];
	}

	function checaLBL($lbl, $n)
	{
		if ($lbl == $n) {
			echo "checked";
		}
	}
?>

<div class="pestanaFrame">
	<label class="pestana-label" id="pes1">
		<input type="radio" name="pestanas" <?php checaLBL($lbl,1); ?> >
		Insertar Director
	</label>
	<label class="pestana-label" id="pes2">
		<input type="radio" name="pestanas" <?php checaLBL($lbl,2); ?> >
		Insertar Actor
	</label>
	<label class="pestana-label" id="pes3">
		<input type="radio" name="pestanas" <?php checaLBL($lbl,3); ?> >
		Insertar Género de Película
	</label>
	<label class="pestana-label" id="pes4">
		<input type="radio" name="pestanas" <?php checaLBL($lbl,4); ?> >
		Insertar Película
	</label>

	<label class="pestana-label" id="pes5">
		<input type="radio" name="pestanas" <?php checaLBL($lbl,5); ?> >
		Ver Directores
	</label>

	<label class="pestana-label" id="pes6">
		<input type="radio" name="pestanas" <?php checaLBL($lbl,6); ?> >
		Ver Películas
	</label>

	<div class="pestana-contenido">
		<div id="pes1-contenido" class="pestana-box">
			<?php require 'Control/ctrlFormDirector.php'; ?>
			<?php require 'Vistas/FormsEntidades/vstFormDirector.php'; ?>
		</div>

		<div id="pes2-contenido" class="pestana-box">
			<?php require 'Control/ctrlFormActor.php'; ?>
			<?php require 'Vistas/FormsEntidades/vstFormActor.php'; ?>

		</div>

		<div id="pes3-contenido" class="pestana-box">
			<?php require 'Control/ctrlFormGenero.php'; ?>
			<?php require 'Vistas/FormsEntidades/vstFormGenero.php'; ?>

		</div>

		<div id="pes4-contenido" class="pestana-box">
			<?php require 'Control/ctrlFormPelicula.php'; ?>
			<?php require 'Vistas/FormsEntidades/vstFormPelicula.php'; ?>

		</div>

		<div id="pes5-contenido" class="pestana-box">
			<?php require 'Control/ctrlVerDirectores.php'; ?>
			<?php require 'Vistas/FormsEntidades/vstVerDirectores.php'; ?>

			<?php require 'Vistas/vstPeliculasDirectores.php'; ?>
		</div>

		<div id="pes6-contenido" class="pestana-box">
			<?php require 'Control/ctrlVerPeliculas.php'; ?>
			<?php require 'Vistas/FormsEntidades/vstVerPeliculas.php'; ?>

			<?php require 'Vistas/vstPeliculaPerfil.php'; ?>
		</div>
	</div>
</div>