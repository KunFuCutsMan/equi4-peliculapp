<?php if ( isset($_GET['label']) && $_GET['label'] == 6 ): ?>
	<?php if ( count($arrInfoPelicula) == 1 ): ?>
	<h2>Información de la Película:</h2>

	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Género</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td> <?php echo $arrInfoPelicula[0][1]; ?> </td>
				<td> <?php echo $arrInfoPelicula[0][2]; ?> </td>
			</tr>
		</tbody>
	</table>

	<?php else: ?>

	<div class="msg-bad">Hubo un error al cargar la película</div>

	<?php endif ?>
<?php endif ?>