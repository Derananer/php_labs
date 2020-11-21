<?php include "header.php"; ?>

<a href="index.php">Назад в главное меню</a>	

<?php 
	try {
		// делаем запрос в таблицу с блюдами. через inner join присоединяем информацию об ингредиентах
		$q_result = mysqli_query($db, " SELECT 
				class.id id, 
				class.studing_year studing_year,
				class.creating_year creating_year,
				class.letter letter, 
				class.students_count students_count, 
				class.kind_id kind_id,
				t.fio master_fio
			FROM classes AS class 
			INNER JOIN teachers as t ON t.id = class.class_master_id");

		// формируем таблицу в том случае, если запрос вернул хотя бы какие-нибудь строчки
		if (mysqli_num_rows($q_result) > 0) { ?>
			<h2>Ученики</h2>
			    <table >
		      		<thead>
						<tr>
						  <th>#</th>
						  <th>Год обучения</th>
						  <th>Буква</th>
						  <th>Количество учеников</th>
						  <th>Код вида</th>
						  <th>Классный руководитель</th>
						  <th>Год создания</th>
						</tr>
		      		</thead>
		      		<tbody>


				<?php 
				// в цикле проходимся по результату запроса, доставая строчки одна за другой и создавая строчки в таблице
				while ($row = mysqli_fetch_array($q_result)) { 
					?>
				      	<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["studing_year"]; ?></td>
							<td><?php echo $row["letter"]; ?></td>
							<td><?php echo $row["students_count"]; ?></td>
							<td><?php echo $row["kind_id"]; ?></td>
							<td><?php echo $row["master_fio"]; ?></td>
							<td><?php echo $row["creating_year"]; ?></td>
				      	</tr>
			 	<?php } ?>
	 		 		</tbody>
  				</table>

		<?php } else {
			echo "<br/>"."Ни одного класса не найдено.";
		}

	} catch (Exception $ex) {
		echo "<br/>"."Ошибка при показе : ". $ex->getMessage();
	}
?>

<?php include "footer.php"; ?>