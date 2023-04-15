<?php
// Задание 2.
//Реализовать удаление элемента массива по его значению.
//Обратите внимание на возможные дубликаты!

// arrayNum - массив с числами
// arrayKeyValue - массив ключ-значение
// arrayArr -многомерный массив

include "arrayTemplates.php";
include "arrayDelete.php";

$array = getArray("arrayKeyValue");
$val = "black";
arrayDel($val,$array);

print_r($array);

$array = getArray("arrayNum");
$val = 6;
arrayDel($val,$array);

print_r($array);

$array = getArray("arrayArr");
$val = 21999;
arrayDel2($val,$array);

print_r($array);


