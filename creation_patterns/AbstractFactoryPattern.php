<?php

/**
 * Interface Shape
 * 形状接口
 */
interface  Shape
{
    public function draw();
}

/**
 * Class Rectangle
 * 形状实体类 - 矩形
 */
class Rectangle implements Shape
{
    public function draw()
    {
        echo "Rectangle draw() method.<br/>";
    }
}

/**
 * Class Circle
 * 形状实体类 - 圆形
 */
class Circle implements Shape
{
    public function draw()
    {
        echo "Circle draw() method.<br/>";
    }
}

/**
 * Interface Color
 * 颜色接口类
 */
interface Color
{
    public function paint();
}

/**
 * Class Red
 * 颜色实体类 - 红
 */
class Red implements Color
{
    public function paint()
    {
        echo "Red paint() method.<br/>";
    }
}

/**
 * Class Blue
 * 颜色实体类 - 蓝
 */
class Blue implements Color
{
    public function paint()
    {
        echo "Blue paint() method.<br/>";
    }
}

/**
 * Class SupperFactory
 * 抽象工厂
 */
abstract class AbstractFactory
{
    abstract public function createShape($shapeType);

    abstract public function createColor($color);
}


/**
 * Class ColorFactory
 * 颜色工厂类
 */
class ColorFactory extends AbstractFactory
{

    public function createColor($color = null)
    {
        echo "Ready to create class {$color} from ColorFactory.<br/>";
        if ($color == "Red") {
            return new Red();
        } else if ($color == "Blue") {
            return new Blue();
        } else {
            return null;
        }
    }

    public function CreateShape($shapeType = null)
    {

    }
}


/**
 * Class ShapeFactory
 * 形状工厂类
 */
class ShapeFactory
{
    public function CreateColor($color = null)
    {

    }

    public function createShape($shapeType = null)
    {
        echo "Ready to create class {$shapeType} from ShapeFactory.<br/>";
        if ($shapeType == "Rectangle") {
            return new Rectangle();
        } elseif ($shapeType == "Circle") {
            return new Circle();
        } else {
            return null;
        }
    }
}

/**
 * Class FactoryProcedure
 * 工厂提供类（可以理解为工厂的工厂，超级工厂）
 */
class FactoryProcedure
{
    public static function createFactory($factoryType = null)
    {
        echo "Ready to create a {$factoryType}.<br/>";
        if ($factoryType == "ColorFactory") {
            return new ColorFactory();
        } elseif ($factoryType == "ShapeFactory") {
            return new ShapeFactory();
        } else {
            return null;
        }
    }
}

FactoryProcedure::createFactory("ShapeFactory")// 创建形状工厂
    ->CreateShape("Rectangle")// 创建形状
    ->draw();// 调用形状方法

FactoryProcedure::createFactory("ShapeFactory")
    ->CreateShape("Circle")
    ->draw();

FactoryProcedure::createFactory("ColorFactory")// 创建颜色工厂
    ->CreateColor("Red")// 创建颜色
    ->paint();// 调用颜色方法

FactoryProcedure::createFactory("ColorFactory")
    ->CreateColor("Blue")
    ->paint();

