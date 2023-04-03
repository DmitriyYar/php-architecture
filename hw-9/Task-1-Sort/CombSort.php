<?php

function combSort($arr)
{
    $gap = count($arr);
    $swap = true;
    while ($gap > 1 || $swap) {
        if ($gap > 1) {
            $gap /= 1.25;
        }
        $swap = false;
        $i = 0;
        while ($i + $gap < count($arr)) {
            if ($arr[$i] > $arr[(int)($i + $gap)]) {
                list($arr[$i], $arr[(int)($i + $gap)]) = array($arr[(int)($i + $gap)], $arr[$i]);
                $swap = true;
            }
            ++$i;
        }
    }
    return $arr;

//    $sizeArray = count($array);
//
//    // Проходимся по всем элементам массива
//    for ($i = 0; $i < $sizeArray; $i++) {
//
//        // Сравниваем попарно.
//        // Начинаем с первого и последнего элемента, затем постепенно уменьшаем
//        // диапазон сравниваемых значеный.
//        for ($j = 0; $j < $i + 1; $j++) {
//
//            // Индекс правого элемента в текущей итерации сравнения
//            $elementRight = ($sizeArray - 1) - ($i - $j);
//
//            if ($array[$j] > $array[$elementRight]) {
//
//                $buff = $array[$j];
//                $array[$j] = $array[$elementRight];
//                $array[$elementRight] = $buff;
//                unset($buff);
//
//            }
//
//        }
//    }
//
//    return $array;
}