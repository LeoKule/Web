<?php
// Начинаем сессию
session_start();

// Обработка отправки формы
if (isset($_POST['submit'])) {
    // Сохраняем данные в сессию
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    // Перенаправляем пользователя на другую страницу
    header('Location: display.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма ввода данных</title>
</head>
<body>
<form method="post">
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname"><br>
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name"><br>
    <label for="age">Возраст:</label>
    <input type="text" id="age" name="age"><br>
    <button type="submit" name="submit">Отправить</button>
</form>
</body>
</html>
