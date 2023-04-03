<?php

function linearSearch ($myArray, $num) {

    $arrCount = count($myArray);

    $step = 0;

    for ($i = 0; $i < $arrCount; $i++) {
        $step += 1;
        if($myArray[$i] == $num) {
            echo "ЧИСЛО НАЙДЕНО! Индекс $i".PHP_EOL;
            echo "количество итераций = $step".PHP_EOL;
            return $i;
        }

        elseif ($myArray[$i] > $num) {
            echo "ЧИСЛО НЕ НАЙДЕНО! Количество шагов: $step" . PHP_EOL;
            return null;
        }
    }
    return null;
}