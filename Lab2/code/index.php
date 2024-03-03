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