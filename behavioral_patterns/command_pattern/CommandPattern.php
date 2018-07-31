<?php

interface Order
{
    public function execute();
}

class Stock
{
    private $name = "Something";
    private $quantity = 100;

    public function buy()
    {
        echo "Stock [ Name: {$this->name}, Quantity: {$this->quantity} ] bought.<br/>";
    }

    public function sell()
    {
        echo "Stock [ Name: {$this->name}, Quantity: {$this->quantity} ] sold.<br/>";
    }
}


class BuyStock implements Order
{
    private $buyStock;

    public function __construct($stock)
    {
        $this->buyStock = $stock;
    }

    public function execute()
    {
        $this->buyStock->buy();
    }
}

class SellStock implements Order
{
    private $sellStock;

    public function __construct($stock)
    {
        $this->sellStock = $stock;
    }

    public function execute()
    {
        $this->sellStock->sell();
    }
}

class Broker
{
    private $orderList = [];

    public function takeOrder($order)
    {
        $this->orderList[] = $order;
    }

    public function placeOrders()
    {
        foreach ($this->orderList as $order)
        {
            $order->execute();
        }
    }
}

// 真正的执行者
$stock = new Stock();
// 接受者
$buyStock = new BuyStock($stock);
// 接受者
$sellStock = new SellStock($stock);
// 调用者
$broker = new Broker();
$broker->takeOrder($buyStock);
$broker->takeOrder($sellStock);
$broker->placeOrders();