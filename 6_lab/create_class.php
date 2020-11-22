<?php include "header.php"; ?>

<a href="get_classes.php">Назад</a>	

<h2>Добавление нового класса в базу данных</h2>

<form method="post">
	<label for="studing_year">Год обучения</label>
	<input type="text" name="studing_year" id="studing_year"></br>

	<label for="letter">Буква</label>
	<input type="text" name="letter" id="letter"></br>

	<label for="kind_id">Код вида</label>
	<input type="text" name="kind_id" id="kind_id"></br>

	<label for="master_id">Код классного руководителя</label>
	<input type="text" name="master_id" id="master_id"></br>

	<label for="creating_year">Год создания</label>
	<input type="text" name="creating_year" id="creating_year"></br></br>

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
	
		$new_class = array(
			"studing_year" => $_POST['studing_year'],
			"kind_id" => $_POST['kind_id'],
			"letter" => '"'.$_POST['letter'].'"',
			"students_count" => '0',
			"class_master_id" => $_POST['master_id'],
			"creating_year" => $_POST['creating_year']
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
			$classes,
			implode(", ", array_keys($new_class)),
			implode(", ", array_values($new_class))
		);

		// делаем запрос в базу
		if (mysqli_query($db, $sql)) {
			echo "<br/>"."Класс добавлен!";

		} else {
			echo "<br/>"."Ошибка при добавлении класса: ".mysqli_error($db);
		}

	} catch (Exception $ex) {
		echo "<br/>"."Ошибка при добавлении класса: ". $ex->getMessage();
	}
} 
?>

<?php include "footer.php"; ?>