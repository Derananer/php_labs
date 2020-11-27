<?php
$array = array(
    "ФИО" => array("Иванов Иван Иванович", "Петров Петр Петрович","Васильев Василий Васильевич"),
    "Возраст" => array("34", "54","29"),
    "Количество посещений страницы" => array("1", "7","3")
    );
?>
<table cellspacing="2" border="1" cellpadding="5">
	<thead>
		<tr>
			<th>ФИО</th>
			<th>Возраст</th>
			<th>Количество посещений страницы</th>
		</tr>
	</thead>
	<tbody>
		<?php
		array_multisort($array["Количество посещений страницы"], $array["ФИО"], $array['Возраст']);
		for($i = 0; $i < count($array); $i++) {
			?>
			<tr>
				<td><?php echo $array['ФИО'][$i]; ?></td>
				<td><?php echo $array['Возраст'][$i];?></td>
				<td><?php echo $array['Количество посещений страницы'][$i];?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>