<?php include "header.php"; ?>

<a href="index.php">Назад в главное меню</a>	

<?php 
	try {
		// делаем запрос в таблицу с блюдами. через inner join присоединяем информацию об ингредиентах
		$q_result = mysqli_query($db, " SELECT 
				student.id id, 
				student.fio fio,
				student.birthday birthday,
				student.gender gender, 
				student.address address, 
				student.mother_fio mother_fio, 
				student.father_fio father_fio, 
				class.studing_year studing_year,
				class.letter class_letter,
				student.additional_info additional_info
			FROM students AS student 
			INNER JOIN classes as class ON student.class_id = class.id");

		// формируем таблицу в том случае, если запрос вернул хотя бы какие-нибудь строчки
		if (mysqli_num_rows($q_result) > 0) { ?>
			<h2>Ученики</h2>
			    <table >
		      		<thead>
						<tr>
						  <th>#</th>
						  <th>ФИО</th>
						  <th>Дата рождения</th>
						  <th>Пол</th>
						  <th>Адресс</th>
						  <th>ФИО матери</th>
						  <th>ФИО отца</th>
						  <th>Класс</th>
						  <th>Дополнительная информация</th>
						</tr>
		      		</thead>
		      		<tbody>


				<?php 
				// в цикле проходимся по результату запроса, доставая строчки одна за другой и создавая строчки в таблице
				while ($row = mysqli_fetch_array($q_result)) { 
					?>
				      	<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["fio"]; ?></td>
							<td><?php echo $row["birthday"]; ?></td>
							<td><?php echo $row["gender"]; ?></td>
							<td><?php echo $row["address"]; ?></td>
							<td><?php echo $row["mother_fio"]; ?></td>
							<td><?php echo $row["father_fio"]; ?></td>
							<td><?php echo $row["studing_year"].$row["class_letter"]; ?></td>
							<td><?php echo $row["additional_info"]; ?></td>
				      	</tr>
			 	<?php } ?>
	 		 		</tbody>
  				</table>

		<?php } else {
			echo "<br/>"."Ни одного ученика не найдено.";
		}

	} catch (Exception $ex) {
		echo "<br/>"."Ошибка при показе : ". $ex->getMessage();
	}
?>
<a href="create_student.php"><strong>Добавить ученика</strong></a>

<?php include "footer.php"; ?>