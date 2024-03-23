<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подсчет слов и символов</title>
</head>
<body>
<form method="post">
    <label>
        <textarea name="text" rows="5" cols="50"></textarea>
    </label><br>
    <button type="submit" name="submit">Подсчитать</button><br>
</form>

<?php
if(isset($_POST['submit'])) {
    $text = $_POST['text'];
    $wordCount = str_word_count($text); // Подсчет слов
    $charCount = mb_strlen($text); // Подсчет символов

    echo "Количество слов: $wordCount <br>";
    echo "Количество символов: $charCount";
}
?>
</body>
</html>
