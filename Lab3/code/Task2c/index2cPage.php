<?php

// Начинаем или возобновляем сессию
session_start();
echo "<title>Task2с</title>";
// Проверяем, существуют ли данные в переменной сессии
if (isset($_SESSION["user_data"])) {
    // Выводим данные циклом
    echo "<ul>";
    foreach ($_SESSION["user_data"] as $key => $value) {
        echo "<li>$key: $value</li>";
    }
    echo "</ul>";
} else {
    echo "No user data found!";
}

