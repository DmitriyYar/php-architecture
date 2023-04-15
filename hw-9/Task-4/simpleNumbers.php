<?php
//https://langtoday.com/?p=590

// решето Эратосфена
function getPrimes($max_number): array
{
    $step = 0;
    $primes = [];
    $is_composite = [];
    for ($i = 4; $i <= $max_number; $i += 2) {
        $is_composite[$i] = true;
    }
    $next_prime = 3;
    while ($next_prime <= (int)sqrt($max_number)) {
        for ($i = $next_prime * 2; $i <= $max_number; $i += $next_prime) {
            $is_composite[$i] = true;
        }
        $next_prime += 2;
        while ($next_prime <= $max_number && isset($is_composite[$next_prime])) {
            $next_prime += 2;
        }
    }
    for ($i = 2; $i <= $max_number; $i++) {
        if (!isset($is_composite[$i])) {
            $primes[] = $i;
            $step += 1;
//            echo  $step . " - " . $i . PHP_EOL;
            if ($step == 10001) {
                echo "10001-м простым числом является: " . $i . PHP_EOL;
            }
        }
    }
    echo "в массиве $step простых чисел" . PHP_EOL;
    return $primes;
}

$array = getPrimes(120000);
//print_r($array);