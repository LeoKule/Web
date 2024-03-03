<?php
//Task 1
echo "Task 1<br/>";
echo "\n";
$very_bad_unclear_name = "15 chicken wings";
//my code here:
$order = &$very_bad_unclear_name; // т.к $order инициализирована  с помощью ссылки на $very_bad_unclear_name, то у них один и тот же адресс в памяти.
                                  // Значит если мы изменим одну переменную, то поменяется и вторая.
$order = " and 2 delicious leg<br/>";
echo "\nYour order is: $very_bad_unclear_name";
echo "\n";

// Task 2
echo "Task 2<br/>";
$a = 14082004;
echo $a;
echo "<br/>";
echo "\n";

$float = 1.4;
echo $float;
echo "<br/>";
echo "\n";

$s = 14081992;
echo $a - $s;
echo "<br/>";
echo "\n";

$last_month = 1187.23;
$this_month = 1089.98;
echo $last_month - $this_month;
echo "<br/>";
echo "\n";

//Task 11
echo "Task 11<br/>";
$numLanguages = 4;
$months = 11;
$days = $months * 16;
$daysPerLanguage = $days / $numLanguages;
echo $daysPerLanguage;
echo "<br/>";
echo "\n";

//Task 12
echo "Task 12<br/>";
echo 8**2; // the first number is raised to the power of the second
echo "<br/>";
echo"\n";

//Task 13
echo "Task 13<br/>";
$myNum = 19;
$answer = $myNum;
$answer += 2;
$answer *= 2;
$answer -= 2;
$answer /= 2;
$answer -= $myNum;
echo $answer;
echo "<br/>";
echo "\n";

//Task 14
echo "Task 14<br/>";
$a = 10;
$b = 3;
$k = 16;
$m = 4;

echo $a % $b;
echo "<br/>";
echo "\n";

if ($a % $b === 0){
    echo "Делится ", $a / $b, "\n";
    echo "<br/>";
}
else echo "Делится с остатком ", $a % $b, "\n";
echo "<br/>";

if ($k % $m === 0){
    echo "Делится ", $k / $m, "\n";
    echo "<br/>";
}
else echo "Делится с остатком ", $k % $m, "\n";


$st = pow(2,10);
echo $st, "\n";
echo "<br/>";

$sqrt245 = sqrt(245);
echo $sqrt245, "\n" , "<br/>";

$arr = [4, 2, 5, 19, 13, 0, 10];
$sum = 0;

foreach ($arr as &$value) {
    $sum += pow($value,2); //Cумма всех элементов в квадрате
}

$sum = sqrt($sum);
echo $sum,"\n", "<br/>";

$sqrt = sqrt(379);
echo round($sqrt), " ", round($sqrt, 1), " ", round($sqrt,2), "\n", "<br/>";  //round - округляет до укзанного приближения числа, 19, 19.1, 19.13 и т д

$sqrt = sqrt(587);
$arr = ['floor' => floor($sqrt), 'ceil' => ceil($sqrt)];

echo $arr['floor'], " ", $arr['ceil'], "\n", "<br/>";  //ceil - округление в большую, floor - в меньшую
//floor и ceil - ключи. Индексов здесь нет, имеем только ключи, следовательно обратиться к $arr[0] не получится.

$arr = [4, -2, 5, 19, -130, 0, 10];
$min = min($arr);
$max = max($arr);
echo $min," ", $max, "\n", "<br/>";

$z=rand(1,100);
echo $z,"\n", "<br/>";

for ($i = 0; $i < 10; $i++){
    $arr[$i] = rand(1,100);
}
for ($i = 0; $i < 10; $i++){
    echo $arr[$i], " ";
}
echo "\n", "<br/>";

$a = 5;
$b = 6;
echo abs($a - $b), "\n", "<br/>";  //проверил, работает с разными а и б

$arr = [1, 2, -1, -2, 3, -3];

for ($i = 0; $i < count($arr); $i++){   //Взял модули от каждого числа в массиве
    $arr[$i] = abs($arr[$i]);
}
for ($i = 0; $i < count($arr); $i++){
    echo $arr[$i], " ";
}
echo "\n", "<br/>";

$h = 69;// Алгоритм заключается в том, что бы берём 1 и идём до самого числа, далее проверяем, делится ли число h на делитель. Да - пушим в массив. Нет так нет(.
$divider = 1;
$i = 0;
$arr = [1];
while ($divider <= $h){
    if($h % $divider === 0){
        $arr[$i] = $divider;
        $i++;
    }
    $divider++;
}

for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i], " ";
}
echo "\n", "<br/>";

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$max_sum = 10;
$arr_sum = 0;
$count = 0;
for ($i = 0; $i < count($arr); $i++){ // проходим
    $arr_sum += $arr[$i]; // суммируем
    $count++; // кол-во
    if ($arr_sum > $max_sum){ // проверка
        break;
    }
}
echo $count, "\n", "<br/>";

//Task 15
echo "Task 15<br/>", "\n";

function printStringReturnNumber()
{
    echo "Hello world! \n";
    return rand(1, 100);
}
$my_Num = printStringReturnNumber();
echo $my_Num, "\n", "<br/>";

//Task 16
echo "Task 16<br/>", "\n";

function increaseEnthusiasm($str){
    $str.= "!";
    return $str;
}
echo increaseEnthusiasm("Believe in yourself"), "\n", "<br/>";

function repeatThreeTimes($str)
{
    $temp = $str;
    $str.= $temp;  //Добавляем к исходной временную
    $str.= $temp;
    return $str;
}
echo repeatThreeTimes("Believe in yourself"), "\n", "<br/>";
echo increaseEnthusiasm(repeatThreeTimes("Believe in yourself")), "\n", "<br/>";

function cut($str, $num = 10){
    $strF = "";
    for($i = 0; $i < $num && $i < strlen($str); $i++){
        $strF[$i] = $str[$i];
    }
    return $strF;
}

echo cut("qwerty"),"\n", "<br/>"; // для примера взял меньше 10 символов.
echo cut("qwerty", 2), "\n", "<br/>";

$arr = [1,2,3,4,5,6,7,8,9];

function recurs($array, $size = 0){ // Значение 0 нужно для того, чтобы в функцию передать только массив.
    echo $array[$size++] , " ";
    if($size < count($array)){ //
        recurs($array, $size);
    }
}
recurs($arr);
echo "\n", "<br/>";

function sumDigits($number) {
    $sum = 0;

    // Пока число больше 0, выделяем цифры и складываем их
    while ($number > 0) {
        $sum += $number % 10;
        $number = (int)($number / 10);
    }

    // Если сумма больше 9, повторяем процесс
    while ($sum > 9) {
        $sum = sumDigits($sum);
    }

    return $sum;
}
// Пример
$number = 12345;
$result = sumDigits($number);
echo "Сумма цифр числа $number: $result", "<br/>";


