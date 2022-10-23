<form class="formulario" action="?label=4" method="post">
	<h2>Insertar Película</h2>

	<label>
		Nombre:
		<input type="text" name="slcPeliNombre" maxlength="200" required>
	</label>

	<label>
		Género:
		<select name="slcPeliGenero" size="5" required>
			<option value="0" > [Seleccione un género] </option>
			<?php
				$gene = new CPeliculaGenero(0, '');
				echo $gene->obtenTodosGenerosHTML();
			?>
		</select>
	</label>

	<label>
		Director:
		<select name="slcPeliDirector" size="5" multiple required>
			<option value="0" >[Seleccione al menos un director]</option>
		<?php
			$direc = new CDirector(0, '', '', 0);
			echo $direc->obtenTodosDirectoresHTML();
		?>
		</select>
	</label>

	<label>
		Actores:
		<select name="slcPeliActores" size="5" multiple required>
			<option value="0" >[Seleccione al menos un actor]</option>
		<?php
			$actor = new CActor(0, '', '', 0);
			echo $actor->obtenTodosActoresHTML();
		?>
		</select>
	</label>

	<label>
		<input type="submit">
	</label>
</form>