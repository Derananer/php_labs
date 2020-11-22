<?php include "header.php"; ?>

<a href="get_subjects.php">Назад</a>	

<h2>Добавление нового предмета в базу данных</h2>

<form method="post">
	<label for="name">Название предмета</label>
	<input type="text" name="name" id="name"></br>

	<label for="description">Описание</label>
	<input type="text" name="description" id="description"></br>

	<label for="teacher_id">Код учителя</label>
	<input type="text" name="teacher_id" id="teacher_id"></br></br>

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
	
		$new_subject = array(
			"name" => '"'.$_POST['name'].'"',
			"teacher_id" => $_POST['teacher_id'],
			"description" => '"'.$_POST['description'].'"',
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
			$subjects,
			implode(", ", array_keys($new_subject)),
			implode(", ", array_values($new_subject))
		);

		// делаем запрос в базу
		if (mysqli_query($db, $sql)) {
			echo "<br/>"."Предмет добавлен!";

		} else {
			echo "<br/>"."Ошибка при добавлении предмета: ".mysqli_error($db);
		}

	} catch (Exception $ex) {
		echo "<br/>"."Ошибка при добавлении предмета: ". $ex->getMessage();
	}
} 
?>

<?php include "footer.php"; ?>