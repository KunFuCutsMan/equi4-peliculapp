<form class="formulario" action="?label=1" method="post">
	<h2>Insertar Director</h2>

	<label>
		Nombre:
		<input type="text" name="txtDirectorNombre" maxlength="60" required>
	</label>

	<label>
		Primer Apellido:
		<input type="text" name="txtDirectorApe1ro" maxlength="60" required>
	</label>

	<label>
		Segundo Apellido:
		<input type="text" name="txtDirectorApe2do" maxlength="60">
	</label>

	<label>
		Nacionalidad:
		<select name="slcDirectorPais" required size="5">
			<option value="0">[Seleccione una Nacionalidad]</option>
			<?php
				$pais = new CPais(0);
				echo $pais->obtenTodosPaisesHTML();
			?>
		</select>
	</label>

	<label>
		<input type="submit">
	</label>
</form>