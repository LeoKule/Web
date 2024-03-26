<?php
// Путь к папке, где хранятся категории
$categoriesDir = 'categories';

// Функция для создания папок категорий, если их нет
function createCategoryFolders($categories) {
    foreach ($categories as $category) {
        $categoryDir = "categories/$category";
        if (!is_dir($categoryDir)) {
            if (!mkdir($categoryDir, 0777, true)) {
                // Если не удалось создать папку, выводим ошибку и прерываем скрипт
                die("Failed to create category directory: $categoryDir");
            }
        }
    }
}

// Функция для сохранения объявления в файл
function saveAd($category, $title, $email, $text) {
    createCategoryFolders(array("Car", "House", "Other")); // Создаем папки категорий, если их нет
    $filename = "categories/$category/$title.txt";
    $data = "Email: $email\nText: $text";
    if (!file_put_contents($filename, $data)) {
        // Если не удалось записать данные в файл, выводим ошибку и прерываем скрипт
        die("Failed to write data to file: $filename");
    }
}

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $category = $_POST["category"];
    $title = $_POST["title"];
    $text = $_POST["text"];

    // Сохраняем объявление
    saveAd($category, $title, $email, $text);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доска объявлений</title>
</head>
<body>
<h1>Доска объявлений</h1>

<!-- Форма для добавления объявления -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Email: <label>
        <input type="email" name="email" required>
    </label><br>
    Категория:
    <label>
        <select name="category" required>
            <option value="Car">Car</option>
            <option value="House">House</option>
            <option value="Other">Other</option>
        </select>
    </label><br>
    Заголовок: <label>
        <input type="text" name="title" required>
    </label><br>
    Текст объявления: <label>
        <textarea name="text" required></textarea>
    </label><br>
    <input type="submit" value="Добавить">
</form>

<hr>

<!-- Список объявлений -->
<h2>Список объявлений</h2>
<table>
    <tr>
        <th>Категория</th>
        <th>Заголовок</th>
        <th>Email</th>
        <th>Текст объявления</th>
    </tr>
    <?php
    // Получаем список категорий
    $categories = array("Car", "House", "Other");

    // Перебираем категории
    foreach ($categories as $category) {
        $categoryDir = "categories/$category";
        // Получаем список файлов в категории
        $ads = glob($categoryDir . "/*.txt");
        foreach ($ads as $adFile) {
            // Получаем данные из файла
            $content = file_get_contents($adFile);
            $lines = explode("\n", $content);
            $email = substr($lines[0], strlen('Email: '));
            $text = substr($lines[1], strlen('Text: '));
            $title = pathinfo($adFile, PATHINFO_FILENAME);
            // Выводим объявление
            echo "<tr>";
            echo "<td>$category</td>";
            echo "<td>$title</td>";
            echo "<td>$email</td>";
            echo "<td>$text</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
</body>
</html>
