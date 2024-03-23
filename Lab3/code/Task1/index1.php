<?php
// Task 1.a
$text = 'ahb acb aeb aeeb adcb axeb';
$regexp = '/a[a-z]{2}b/ui';

$count = preg_match_all($regexp, $text, $matches);
var_dump($matches);
echo "<br>";

// Task 1.b
$text = 'a1b2c3';

$result = preg_replace_callback(
// Регулярное выражение для поиска чисел
    '/\d+/',
    // Функция обратного вызова для замены найденных чисел их кубами
    fn($matches) => pow($matches[0], 3),
    $text
);
// Вывод результата
echo $result;
