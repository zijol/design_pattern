<?php

/**
 * Interface Shape
 * 形状接口
 */
interface Shape
{
    public function draw();
}

/**
 * Class ShapeDecorator
 * 形状装饰器抽象类
 */
abstract class ShapeDecorator implements Shape
{
    protected $shape;

    public function __construct($shape)
    {
        $this->shape = $shape;
    }

    public function draw()
    {
        $this->shape->draw();
    }
}

/**
 * Class RedShapeDecorator
 * 颜色装饰器实体类
 */
class RedShapeDecorator extends ShapeDecorator
{
    public function draw()
    {
        $this->shape->draw();
        $this->setBorderRed();
    }

    private function setBorderRed()
    {
        echo "Border Color: Red.<br/>";
    }
}

/**
 * Class Circle
 */
class Circle implements Shape
{
    public function draw()
    {
        echo "I am a Circle.<br/>";
    }
}

class Rectangle implements Shape
{
    public function draw()
    {
        echo "I am a Rectangle.<br/>";
    }
}

// 普通形状
$circle = new Circle();

// 红色装饰器装饰过的形状
$redCircle = new RedShapeDecorator($circle);

// 普通形状
$rectangle = new Rectangle();

// 红色装起装饰过的形状
$redRectangle = new RedShapeDecorator($rectangle);

$circle->draw();
$redCircle->draw();
$rectangle->draw();
$redRectangle->draw();