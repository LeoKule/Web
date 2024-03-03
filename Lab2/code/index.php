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