<?php

/**
 * Interface Shape
 * 形状接口类
 */
interface Shape
{
    /**
     * 计算面积
     * @return mixed
     */
    public function getAcreage();

    /**
     * 计算周长
     * @return mixed
     */
    public function getPerimeter();
}

/**
 * Class Triangle
 * 三角形
 */
class Triangle implements Shape
{
    public function getAcreage()
    {
        // TODO: Implement getAcreage() method.
    }

    public function getPerimeter()
    {
        // TODO: Implement getPerimeter() method.
    }
}

/**
 * Class Rectangle
 * 矩形
 */
class Rectangle implements Shape
{

    public function getAcreage()
    {
        // TODO: Implement getAcreage() method.
    }

    public function getPerimeter()
    {
        // TODO: Implement getPerimeter() method.
    }
}

/**
 * Class Circular
 * 圆形
 */
class Circular implements Shape
{
    public function getAcreage()
    {
        // TODO: Implement getAcreage() method.
    }

    public function getPerimeter()
    {
        // TODO: Implement getPerimeter() method.
    }
}

/**
 * Class ShapeFactory
 * 形状工厂类
 */
class ShapeFactory
{
    /**
     * 创建形状
     */
    public function createShape($shapeType = NULL)
    {
        if ($shapeType == 'Triangle') {
            return new Triangle();
        } else if ($shapeType == 'Rectangle') {
            return new Rectangle();
        } elseif ($shapeType == 'Circular') {
            return new Circular();
        } else {
            return NULL;
        }
    }
}

?>
