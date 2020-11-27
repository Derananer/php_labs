<?php
$array = array(
    "Комедия" => array("Другая женщина", "Мы - Миллеры"),
    "Мелодрама" => array("Титаник", "Улыбка Моны Лизы"),
    "Детектив" => array("Шерлок Холмс", "Шерлок Холмс 2")
    );
?>

<table cellspacing="2" border="1" cellpadding="5">
	<thead>
		<tr>
			<th>Жанр</th>
			<th>Фильмы</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($array as $key => $value) {
			?>
			<tr>
				<td><?php echo $key; ?></td>
				<td><?php echo implode(", ", array_values($value));?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>