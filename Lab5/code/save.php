<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn]
function redirection(): void
{
    header('index.php');
    exit();
}

if (!isset($_POST['email'], $_POST['category'], $_POST['name'], $_POST['description'])) {
    redirection();
}

$category = $_POST['category'];
$name = $_POST['name'];
$description = $_POST['description'];
$email = $_POST['email'];

// подключение к базе данных
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if ($mysqli->connect_errno) {
    printf("Подключение к MySQL невозможно, код ошибки: %s\n", $mysqli->connect_error);
    exit();
}

// экранирование данных для предотвращения SQL-инъекций
$category = $mysqli->real_escape_string($category);
$name = $mysqli->real_escape_string($name);
$description = $mysqli->real_escape_string($description);
$email = $mysqli->real_escape_string($email);

// вставка данных в таблицу
$query = "INSERT INTO ad (email, title, description, category) VALUES ('$email', '$name','$description','$category')";
$mysqli->query($query);

$result = $mysqli->query('SELECT * FROM ad');
$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// закрытие соединения с базой данных
$mysqli->close();

redirection();
