<?php

/**
 * Interface Item
 * 条目接口
 */
interface Item
{
    // 获取名字
    public function name();

    // 获取包装
    public function pack();

    // 获取价格
    public function price();
}

/**
 * Class Burger
 * 汉堡的抽象类
 * 所有的汉堡都要实现包装接口，并且所有汉堡都用Wrapper方式包装
 */
abstract class Burger implements Item
{
    public function pack()
    {
        return "Wrapper";
    }
}

/**
 * Class ColdDrink
 * 冷饮的抽象类
 * 所有的冷饮都要实现包装接口，并且所有的冷饮都是使用Bottle方式包装
 */
abstract class ColdDrink implements Item
{
    public function pack()
    {
        return "Bottle";
    }
}

/**
 * Class VegBurger
 * 汉堡的实体类
 */
class VegBurger extends Burger
{
    public $count = 1;

    public function __construct($count = 1)
    {
        $this->count = $count;
    }

    public function name()
    {
        return "ChickenBurger";
    }

    public function price()
    {
        return 20 * $this->count;
    }
}

/**
 * Class ChickenBurger
 * 汉堡的实体类
 */
class ChickenBurger extends Burger
{
    public $count = 1;

    public function __construct($count = 1)
    {
        $this->count = $count;
    }

    public function name()
    {
        return "ChickenBurger";
    }

    public function price()
    {
        return 25 * $this->count;
    }
}

/**
 * Class Coke
 * 冷饮的实体类
 */
class Coke extends ColdDrink
{
    public $count = 1;

    public function __construct($count = 1)
    {
        $this->count = $count;
    }

    public function name()
    {
        return "Coke";
    }

    public function price()
    {
        return 15 * $this->count;
    }
}

/**
 * Class Pepsi
 * 冷饮的实体类
 */
class Pepsi extends ColdDrink
{
    public $count = 1;

    public function __construct($count = 1)
    {
        $this->count = $count;
    }

    public function name()
    {
        return "Pepsi";
    }

    public function price()
    {
        return 12 * $this->count;
    }
}

/**
 * Class Meal
 * 餐
 */
class Meal
{
    // 餐中的条目
    public $_items = [];

    /**
     * @param $item
     * 加条目
     */
    public function addItem($item)
    {
        array_push($this->_items, $item);
    }

    public function listAll()
    {
        echo "------------清单------------<br/>";
        foreach ($this->_items as $item) {
            echo $item->name() . " x " . $item->count . $item->pack() . " Price: ¥" . $item->price() . "<br/>";
        }
        echo "------------清单------------<br/>";
        echo "\t 总价： ¥" . $this->totalPrice() . "<br/>";
    }

    public function totalPrice()
    {
        $totalPrice = 0;
        foreach ($this->_items as $item) {
            $totalPrice += $item->price();
        }
        return $totalPrice;
    }
}

$meal = new Meal();
$meal->addItem(new Coke(2));
$meal->addItem(new ChickenBurger(2));
$meal->listAll();


$meal = new Meal();
$meal->addItem(new Pepsi(2));
$meal->addItem(new VegBurger(2));
$meal->listAll();