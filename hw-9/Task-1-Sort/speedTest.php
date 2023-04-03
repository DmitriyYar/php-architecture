<?php

include 'randArray.php';
include 'Bubble.php';
include 'QuickSort.php';
include 'QuickSort_2.php';
include 'Heapsort.php';
include 'insertSort.php';
include 'PigeonholeSort.php';
include 'MergeSort.php';
include 'InsertSortSPL.php';
include 'HeapSplSort.php';
include 'DualSelectSort.php';
include 'CombSort.php';

function getArr(): array
{
    return _randArray(30000);
}

$arr = getArr();
$start = microtime(true);
insertion_sort($arr);
echo "Сортировка вставками: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
splInsertSort($arr);
echo "Сортировка вставками SPL: " . "\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
bubbleSort($arr);
echo "Сортировка пузырьком: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
dualSelectSort($arr);
echo "Сортировка выбором: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
combSort($arr);
echo "Сортировка расческой: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$lastIndex = count($arr) - 1;
$start = microtime(true);
quickSort($arr, 0, $lastIndex);
echo "Сортировка быстрая методичка: " . "\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
quickSortLesson($arr);
echo "Сортировка быстрая: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
treeSort($arr);
echo "Сортировка пирамидальная SPL: " . "\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
sort($arr);
echo "Сортировка из PHP: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
mergeSort($arr);
echo "Сортировка слиянием: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
$start = microtime(true);
pigeonholeSort($arr);
echo "Сортировка голубиная: " . "\t\t" . (microtime(true) - $start) . PHP_EOL;

//printArray($arr);
