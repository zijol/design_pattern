<?php

/**
 * Interface DrawApi
 * 绘画接口
 */
interface DrawApi
{
    public function drawCircle($radius, $x, $y);
}

/**
 * Class RedCircle
 * 实现具体类
 */
class RedCircle implements DrawApi
{
    public function drawCircle($radius, $x, $y)
    {
        echo "Draw a red circle at [x:$x, y:$y].<br/>";
    }
}

/**
 * Class GreenCircle
 * 实现层面具体类
 */
class GreenCircle implements DrawApi
{
    public function drawCircle($radius, $x, $y)
    {
        echo "Draw a green circle at [x:$x, y:$y].<br/>";
    }
}

/**
 * Class Shape
 * 抽象形状类
 */
abstract class Shape
{
    protected $drawApi;

    public function __construct($drawApi)
    {
        $this->drawApi = $drawApi;
    }

    public abstract function draw();
}

/**
 * Class Circle
 * 抽象实体类
 */
class Circle extends Shape
{
    private $x;
    private $y;
    private $radius;
    public function __construct($radius, $x, $y, $drawApi)
    {
        parent::__construct($drawApi);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw()
    {
        $this->drawApi->drawCircle($this->radius, $this->x, $this->y);
    }
}

$redCircle = new Circle(5, 10, 10, new RedCircle());
$greenCircle = new Circle(10, 20, 20, new GreenCircle());
$redCircle->draw();
$greenCircle->draw();