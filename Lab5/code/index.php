<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма и объявления</title>
</head>
<body>
<h1>Добавить объявление</h1>
<form action="save.php" method="post">
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Категория: <input type="text" name="category" required></label><br>
    <label>Название: <input type="text" name="name" required></label><br>
    <label>Описание: <textarea name="description" required></textarea></label><br>
    <button type="submit">Отправить</button>
</form>

<h1>Все объявления</h1>
</body>
</html>
