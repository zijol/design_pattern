<?php
interface Shap
{
    public function draw();
}

class Circle implements Shap
{
    private $color;
    private $x;
    private $y;
    private $radius;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function draw()
    {
        $halfRadius = $this->radius/1;
        $color = strtolower($this->color);
        $div = "<div style='border:solid {$color} 2px; width: {$this->radius}px; height: {$this->radius}px; border-radius: {$halfRadius}px; position: absolute; left: {$this->x}px; top: {$this->y}px; text-align: center; line-height: {$this->radius}px;'>
                {$this->x}:{$this->y} R{$this->radius}</div>";
//        echo "Circle draw(): [Color: {$this->color}, X: {$this->x}, Y: {$this->y}, Radius: {$this->radius}<br/>";
        echo $div;
    }
}

class ShapeFactory
{
    private static $shapeList = [];

    public static function createShape($color)
    {
        foreach (self::$shapeList as $key => $shape) {
            if ($key === $color) {
                return self::$shapeList[$color];
            }
        }
        self::$shapeList[$color] = new Circle($color);

        return self::$shapeList[$color];
    }
}


$colorList = [
    'aqua', 'black', 'blue', 'fuchsia', 'gray',
    'green', 'lime', 'maroon', 'navy', 'olive',
    'orange', 'purple', 'red', 'silver', 'teal',
    'yellow'
];
$maxLen = count($colorList)-1;

for ($i = 0; $i < 4; $i++)
{
    $circle = ShapeFactory::createShape($colorList[rand(0,$maxLen)]);
    $circle->setX(rand(0,1000));
    $circle->setY(rand(0,500));
    $circle->setRadius(rand(120,200));
    $circle->draw();
}
