<?php

/**
 * Class Shape
 */
abstract class Shape
{
    abstract public function shapeClone();
}

/**
 * Class Rectangle
 */
class Rectangle extends Shape
{
    public $w = 1;
    public $h = 1;

    public function __construct($w = 1, $h = 1)
    {
        $this->h = $h;
        $this->w = $w;
    }

    public function shapeClone()
    {
        return clone $this;
    }

    public function getAcreage()
    {
        return "[Acreage = Width * Height] => " . $this->w * $this->h;
    }
}

/**
 * Class Circle
 */
class Circle extends Shape
{
    public $r = 1;

    public function __construct($r = 0)
    {
        $this->r = $r;
    }

    public function shapeClone()
    {
        return clone $this;
    }

    public function getAcreage()
    {
        return "[Acreage = PI * r * r] => " . 3.14 * $this->r * $this->r;
    }
}

$rectangle = new Rectangle(2,2);
$rectangle1 = $rectangle->shapeClone();
$rectangle1->w = 4;
$rectangle1->h = 4;
echo "rectangle acreage :" . $rectangle->getAcreage() . "<br/>";
echo "rectangle1 acreage :" . $rectangle1->getAcreage() . "<br/>";

$circle = new Circle(2);
$circle1 = $circle->shapeClone();
$circle1->r = 4;
echo "circle acreage :" . $circle->getAcreage() . "<br/>";
echo "circle1 acreage :" . $circle1->getAcreage() . "<br/>";