<?php include "header.php"; ?>

<a href="index.php">Назад в главное меню</a>	

<?php 
	try {
		// делаем запрос в таблицу с блюдами. через inner join присоединяем информацию об ингредиентах
		$q_result = mysqli_query($db, " SELECT 
				teacher.id id, 
				teacher.fio fio
			FROM teachers AS teacher");

		// формируем таблицу в том случае, если запрос вернул хотя бы какие-нибудь строчки
		if (mysqli_num_rows($q_result) > 0) { ?>
			<h2>Учителя</h2>
			    <table >
		      		<thead>
						<tr>
						  <th>#</th>
						  <th>ФИО</th>
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
				      	</tr>
			 	<?php } ?>
	 		 		</tbody>
  				</table>

		<?php } else {
			echo "<br/>"."Ни одного Учителя не найдено.";
		}

	} catch (Exception $ex) {
		echo "<br/>"."Ошибка при показе : ". $ex->getMessage();
	}
?>
<a href="create_teacher.php"><strong>Добавить учителя</strong></a>

<?php include "footer.php"; ?>