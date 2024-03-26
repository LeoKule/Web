<?php
// Начинаем или возобновляем сессию
session_start();

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST["name"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];

    // Проверяем, чтобы зарплата не была отрицательной
    if ($salary >= 0) {
        // Записываем данные в переменную сессии в виде массива
        $_SESSION["user_data"] = array(
            "name" => $name,
            "age" => $age,
            "salary" => $salary
        );

        // Перенаправляем пользователя на другую страницу
        header("Location: index2cPage.php");
        exit();
    } else {
        // Если зарплата отрицательная, выводим сообщение об ошибке
        $error_message = "Salary cannot be negative!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task2c</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name"><br>
    Age: <input type="number" name="age"><br>
    Salary: <input type="number" name="salary"><br>
    <input type="submit" value="Submit">
</form>
<?php if(isset($error_message)) echo "<p>$error_message</p>"; ?>
</body>
</html>
