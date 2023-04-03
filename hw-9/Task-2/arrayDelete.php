<?php

function arrayDel($val, &$array): array
{
    $key = array_search($val, $array);
    if ($key !== false) {
        unset($array[$key]);
    }
    return $array;
}

function arrayDel1(string $val, &$array): array
{
    foreach ($array as $key => $item) {
        foreach ($item as $key1 => $item1) {
            if ($item1 == $val) {
                unset($array[$key]);
            }
        }
    }
    return $array;
}

function arrayDel2($val, &$array): array
{
    foreach ($array as $key => $item) {
        $key2 = in_array($val,  $item, true);
        if ($key2) {
            unset($array[$key]);
        }
    }
    return $array;
}



