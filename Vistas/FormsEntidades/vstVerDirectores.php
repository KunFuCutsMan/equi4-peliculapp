<form class="formulario" action="?label=5" method="post">
	<h2>Ver Directores</h2>

	<label>
		Buscar:
		<select name="verDirectorId" required>
		<option value="0">[Seleccione un Director]</option>
		<?php
			$direc = new CDirector(0, '', '', 0);
			echo $direc->obtenTodosDirectoresHTML();
		?>
		</select>
	</label>

	<label>
		<input type="submit">
	</label>
</form>