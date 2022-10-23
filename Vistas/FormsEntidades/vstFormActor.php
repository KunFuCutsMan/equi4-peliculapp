<form class="formulario" action="?label=2" method="post">
	<h2>Insertar Actor</h2>

	<label>
		Nombre:
		<input type="text" name="txtActorNombre" maxlength="60" required>
	</label>

	<label>
		Primer Apellido:
		<input type="text" name="txtActorApe1ro" maxlength="60" required>
	</label>

	<label>
		Segundo Apellido:
		<input type="text" name="txtActorApe2do" maxlength="60">
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