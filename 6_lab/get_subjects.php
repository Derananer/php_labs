<?php include "header.php"; ?>

<a href="index.php">Назад в главное меню</a>	

<?php 
	try {
		// делаем запрос в таблицу с блюдами. через inner join присоединяем информацию об ингредиентах
		$q_result = mysqli_query($db, " SELECT 
				subject.id id, 
				subject.name name,
				subject.description description,
				t.fio teacher_fio
			FROM subjects AS subject 
			INNER JOIN teachers as t ON t.id = subject.teacher_id");

		// формируем таблицу в том случае, если запрос вернул хотя бы какие-нибудь строчки
		if (mysqli_num_rows($q_result) > 0) { ?>
			<h2>Ученики</h2>
			    <table >
		      		<thead>
						<tr>
						  <th>#</th>
						  <th>Название предмета</th>
						  <th>Описание</th>
						  <th>Учитель</th>
						</tr>
		      		</thead>
		      		<tbody>


				<?php 
				// в цикле проходимся по результату запроса, доставая строчки одна за другой и создавая строчки в таблице
				while ($row = mysqli_fetch_array($q_result)) { 
					?>
				      	<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["description"]; ?></td>
							<td><?php echo $row["teacher_fio"]; ?></td>
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