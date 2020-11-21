<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <title>ЛР №6, Суспицина И.А.</title>

    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <h1>База данных школы</h1>
  </body>
</html>

<?php 

$host = "localhost";
$username = "root";
$password = "root";
$dbname = "school";
$teachers = "teachers";
$classes = "classes";
$students = "students";
$subjects = "subjects";

$db = mysqli_connect($host, $username, $password);  // создаем соединение с базой

// при наличии ошибки выведем информацию о ней
if (!$db) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL . "<br/>"; 
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL . "<br/>";
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL . "<br/>";
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL . "<br/><br/><br/>";

// выберем базу данных для исполнения запросов
mysqli_select_db($db, $dbname);

?>