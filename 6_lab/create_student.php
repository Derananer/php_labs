<?php include "header.php"; ?>

<a href="get_students.php">Назад</a>	

<h2>Добавление нового ученика в базу данных</h2>

<form method="post">
	<label for="fio">ФИО (строка)</label>
	<input type="text" name="fio" id="fio"></br>

	<label for="birthday">Дата рождения</label>
	<input type="text" name="birthday" id="birthday"></br>

	<label for="gender">Пол (в строчку)</label>
	<input type="text" name="gender" id="gender"></br>

	<label for="address">Адрес (строка)</label>
	<input type="text" name="address" id="address"></br>

	<label for="mother_fio">ФИО матери</label>
	<input type="text" name="mother_fio" id="mother_fio"></br>

	<label for="father_fio">ФИО отца</label>
	<input type="text" name="father_fio" id="father_fio"></br>

	<label for="class_id">Код класса</label>
	<input type="text" name="class_id" id="class_id"></br>

	<label for="additional_info">Дополнительная информация</label>
	<input type="text" name="additional_info" id="additional_info"></br></br>

	<input type="submit" name="submit" value="Сохранить">
</form>


<?php 
if (isset($_POST['submit'])) {
	try {
		// формируем массив new_employee, где ключ = название поля в БД, значение = значение переданное из формы
		// значения переданные из формы хранятся в массиве $_POST и имеют ключи такие же, как у элементов формы

		// например значение из текстового поля
		// <input type="text" name="gender" id="gender"></br>
		// будет получено через $_POST['gender']
		// значения типа строки обособляем двойными ковычками
	
		$new_student = array(
			"fio" => '"'.$_POST['fio'].'"',
			"birthday" => '"'.$_POST['birthday'].'"',
			"gender" => '"'.$_POST['gender'].'"',
			"address" => '"'.$_POST['address'].'"',
			"mother_fio" => '"'.$_POST['mother_fio'].'"',
			"father_fio" => '"'.$_POST['father_fio'].'"',
			"class_id" => $_POST['class_id'],
			"additional_info" => '"'.$_POST['additional_info'].'"'
		);


		// создаем sql запрос через форматированную строку sprintf
		// в такой строке элементы под знаком % будут в дальнейшем заменены на реальные значения
		// 
		// например изначальная строка insert into %s(%s) values(%s), заменится на insert into employees(name, age, и т.д.
		// пример полной строки для добавления строчки в таблицу employees есть в файле db/init.sql
		//
		// implode соединит значения в массиве строк разделителем, указанным первым параметром.
		// например implode(", ", array_keys($new_employee)) превратит массив [name, age, gender] в строчку "name, age, gender"
		$sql = sprintf(
			"INSERT INTO %s(%s) values (%s)",
			$students,
			implode(", ", array_keys($new_student)),
			implode(", ", array_values($new_student))
		);

		$update_query="update classes set students_count=students_count + 1 where id=".$_POST['class_id'];
		// делаем запрос в базу
		if(mysqli_query($db, $update_query)){


			if (mysqli_query($db, $sql)) {
				echo "<br/>"."Ученик добавлен!";
			} else {
				$update_query="update classes set students_count=students_count-1 where id=".$_POST['class_id'];
				mysqli_query($db, $update_query);
				echo "<br/>"."Ошибка при добавлении ученика: ".mysqli_error($db);
			}
		}
	} catch (Exception $ex) {
		echo "<br/>"."Ошибка при добавлении ученика: ". $ex->getMessage();
	}
} 
?>

<?php include "footer.php"; ?>