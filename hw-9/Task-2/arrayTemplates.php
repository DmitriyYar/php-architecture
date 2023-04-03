<?php

function getArray(string $arr): array
{
    $arrayNum = [1, 3, 4, 6, 12, 234, 567];

    $arrayKeyValue = array("a" => "red", "b" => "blue", "c" => "green", "d" => "yellow", "e" => "black", "f" => "white");

    $arrayArr = [
        [
            'price' => 21999,
            'shop_name' => 'Shop 1',
            'shop_link' => 'http://'
        ],
        [
            'price' => 21550,
            'shop_name' => 'Shop 2',
            'shop_link' => 'http://'
        ],
        [
            'price' => 21950,
            'shop_name' => 'Shop 3',
            'shop_link' => 'http://'
        ],
        [
            'price' => 21350,
            'shop_name' => 'Shop 4',
            'shop_link' => 'http://'
        ],
        [
            'price' => 21050,
            'shop_name' => 'Shop 5',
            'shop_link' => 'http://'
        ]
    ];

    $array = [];

    switch ($arr) {
        case "arrayNum":
            $array = $arrayNum;
            break;
        case "arrayKeyValue":
            $array = $arrayKeyValue;
            break;
        case "arrayArr":
            $array = $arrayArr;
            break;
//        default:
//            $array = $arrayArr;
//            break;
    }

    return $array;
}