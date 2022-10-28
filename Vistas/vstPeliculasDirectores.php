<?php if ( isset($_GET['label']) && $_GET['label'] == 5 ): ?>
	<?php if ( count($arrPeliculasDeDirector) >= 1 ): ?>
	<h2>Películas del Director:</h2>

	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Género</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($arrPeliculasDeDirector as $peli): ?>
			<tr>
				<td> <?php echo $peli[0]; ?> </td>
				<td> <?php echo $peli[1]; ?> </td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>

	<?php else: ?>

	<div class="msg-bad">El director no tiene alguna película registrada</div>

	<?php endif ?>
<?php endif ?>