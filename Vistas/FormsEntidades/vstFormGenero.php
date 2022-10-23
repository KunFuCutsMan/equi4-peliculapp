<form class="formulario" action="?label=3" method="post">
	<h2>Insertar Categoría de Película</h2>

	<label>
		Género:
		<input type="text" name="txtCategoGenero" maxlength="60"
			oninput="cambiaAMayus(this);" required>
	</label>

	<label>
		<input type="submit">
	</label>
</form>