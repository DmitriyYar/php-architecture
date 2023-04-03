<?php
// 3. Подсчитать практически количество шагов при поиске описанными в методичке алгоритмами.

include 'randArray.php';
include 'LinearSearch.php';
include 'BinarySearch.php';
include 'InterpolationSearch.php';

//const NUM = 100; //5000

$arr = getSortRandArray();

$num = $arr[count($arr)-1];
print_r($num . PHP_EOL);

echo "Линейный поиск" . PHP_EOL;
linearSearch($arr, $num) . PHP_EOL;

echo "Бинарный поиск" . PHP_EOL;
binarySearch($arr, $num) . PHP_EOL;

echo "Интерполяционный" . PHP_EOL;
interpolationSearch($arr, $num);
