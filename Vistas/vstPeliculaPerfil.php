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

	<table>
		<thead>
			<tr>
			<th>Directores</th>
			<th>Apellidos</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$directs = new CDirector(0, '', '', 0);

			$directores =
				$directs->obtenDirectoresDePelicula( $arrInfoPelicula[0][0] );

			foreach ($directores as $direc) { ?>
			<tr>
			<td><?php echo $direc[1]; ?></td>
			<td><?php echo "$direc[2] $direc[3]"; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

	<table>
		<thead>
			<tr>
			<th>Actores</th>
			<th>Apellidos</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$acts = new CActor(0, '','', 0);

			$actores = $acts->obtenActoresEnPelicula( $arrInfoPelicula[0][0]);

			foreach ($actores as $actor) { ?>
			<tr>
			<td><?php echo $actor[1]; ?></td>
			<td><?php echo "$actor[2] $actor[3]"; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

	<?php else: ?>

	<div class="msg-bad">Hubo un error al cargar la película</div>

	<?php endif ?>
<?php endif ?>