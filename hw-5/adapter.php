<?php

interface ISquare
{
    function squareArea(int $sideSquare);
}

interface ICircle
{
    function circleArea(int $circumference);
}

class SquareAdapter implements ISquare
{
    protected $lib;

    public function __construct()
    {
        $this->lib = new SquareAreaLib();
    }

    function squareArea(int $sideSquare)
    {
        $diagonal = floor($sideSquare * sqrt(2));
        return $this->lib->getSquareArea($diagonal);
    }
}

class CircleAdapter implements ICircle
{
    protected $lib;

    public function __construct()
    {
        $this->lib = new  CircleAreaLib();
    }

    function circleArea(int $circumference)
    {
        $diameter = floor($circumference / M_PI);
        return $this->lib->getCircleArea($diameter);
    }
}

// вычисление площади квадрата
class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal ** 2) / 2;
        return $area;
    }
}

// вычисление площади круга
class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal ** 2) / 4;
        return $area;
    }
}

$squareArea = new SquareAdapter;
$area = $squareArea->squareArea(4);
print_r($area . PHP_EOL);

$circleArea = new CircleAdapter();
$area = $circleArea->circleArea(4);
print_r($area . PHP_EOL);
