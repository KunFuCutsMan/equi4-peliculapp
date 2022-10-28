<form class="formulario" action="?label=6" method="post">
	<h2>Ver Películas</h2>

	<label>
		Buscar:
		<select name="verPeliculaID" required>
		<option value="0">[Seleccione una película]</option>
		<?php 
			$peli = new CPelicula(0, '', 0);
			echo $peli->obtenTodasPeliculasHTML();
		?>
		</select>
	</label>

	<label>
		<input type="submit">
	</label>
</form>