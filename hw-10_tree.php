<?php
$x = 10;
$y = 30;
$z = 50;
$expression = "($x + 42)^2+ 7 * $y - $z";

//$expression = "(8+2)*2/2";
//$expression = '(3+5*6+7^2)+8*6*7*(6*8^2+3/2)+6-9+8';
//$expression = '2*(15-26/8)^3+(4+3)^5*(5-3)^4+9';
//$expression = '(3+2*2)^2*(5-6/8)^3+5^3-6*9+9';
//$expression = "2*(15-26/2)^3+(2+3)^5*(5-3)^4+9";

// разбираем входное выражение на лексемы
function parser($str): array
{
    $str = mb_strtolower($str, 'UTF-8'); // приведение строки к нижнему регистру
    $str = str_replace(" ", "", $str); // заменяем  " " на "" в строке $str
    $arStr = preg_split('/(?!^)(?=.)/u', $str); // разбиваем строку в массив

    $stack = $arStr[0];
    $arrayTokens = [];
    for ($i = 1; $i < count($arStr); ++$i) {
        if (preg_match("/^[\d.]/", $stack) && preg_match("/^[\d.]/", $arStr[$i])) {
            $stack = $stack . $arStr[$i];
        } else {
            $arrayTokens[] .= $stack;
            $stack = $arStr[$i];
        }
    }
    $arrayTokens[] .= $stack;
    return $arrayTokens;
}

function pushStack(&$stack, $symbol): void
{
    if (preg_match('/[+ \- * \/ ^ ( ]/', $symbol,)) {
        $stack[] .= $symbol;
    } else {
        echo "Неверное выражение";
        die();
    }
}

function Postfix(&$token_list): string
{
    $stack = [];
    $strPostfix = '';
    $length = count($token_list);

    for ($i = 0; $i < $length; $i++) {
        $x = $token_list[$i];
        if (preg_match('/[a-z 0-9]/', $x,)) {
            $strPostfix .= $x . ' ';
        } else {
            if (count($stack) != 0) {
                $lastElem = $stack[array_key_last($stack)];
                if ($lastElem == "^") {
                    $strPostfix .= array_pop($stack) . ' ';
                    if ($x != '*' && $x != '/') {
                        $strPostfix .= array_pop($stack) . ' ';
                    }
                }
                if (($lastElem == "/" || $lastElem == "*") && $x != '^' && $x != '(') {
                    $strPostfix .= array_pop($stack) . ' ';
                    if ($x == '+' || $x == '-') {
                        $strPostfix .= array_pop($stack) . ' ';
                    }
                }
                if (($x == '+' || $x == '-') && count($stack) != 0 && $stack[array_key_last($stack)] != '(') {
                    $strPostfix .= array_pop($stack) . ' ';
                }
                if ($x == ")") {
                    foreach ($stack as $key) {
                        if ($stack[array_key_last($stack)] == '(') {
                            array_splice($stack, count($stack) - 1, 1);
                            break;
                        } else {
                            $strPostfix .= array_pop($stack) . ' ';
                        }
                    }
                    continue;
                }
            }
            pushStack($stack, $x);
        }
    }
    foreach ($stack as $key) {
        $strPostfix .= array_pop($stack) . ' ';
    }
    return $strPostfix;
}

function Execute(string $op, float $first, float $second): float
{
    if ($op == '+') $result = $first + $second;
    if ($op == '-') $result = $first - $second;
    if ($op == '*') $result = $first * $second;
    if ($op == '/') $result = $first / $second;
    if ($op == '^') $result = pow($first, $second);
    return $result;
}

function Calc(string $res): string
{
    // Стек для хранения чисел
    $stack = [];
    // Результат вычисления
    $result = 0;
    // Проходим по строке
    $arrayPostfix = explode(" ", $res);

    for ($i = 0; $i < count($arrayPostfix) - 1; $i++) {
        if (preg_match('/[a-z 0-9]/', $arrayPostfix[$i])) {
            $stack[] .= (float)$arrayPostfix[$i];
        }
        if (preg_match('/[+ \- * \/ ^ ( ]/', $arrayPostfix[$i])) {
            $second = array_pop($stack);
            $first = array_pop($stack);
            $result = Execute($arrayPostfix[$i], $first, $second);
            $stack[] .= $result;
        }
    }
    return $result;
}

$token_list1 = parser($expression);
$postfix = Postfix($token_list1);
$res = Calc($postfix);

echo "Входное выражение:\t$expression"  . PHP_EOL;
echo "Разобранное выражение:\t$postfix" . PHP_EOL;
echo "Результат вычисления:\t$res" . PHP_EOL;