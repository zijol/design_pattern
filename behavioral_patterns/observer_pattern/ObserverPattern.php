<?php
// 观察者接口
interface Observer {
    public function sayHello();
}

// 主题接口
interface Subject {
    // 注册观察者
    public function registerObserver(Observer $observer);
    public function notify();
}

// 具体主题类
class Action implements Subject {
    private $_observers = [];

    /**
     * @param Observer $observer
     * 注册观察者
     */
    public function registerObserver(Observer $observer)
    {
        $this->_observers[] = $observer;
        // TODO: Implement registerObserver() method.
    }

    /**
     * 通知
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->_observers as $ob) {
            $ob->sayHello();
        }
    }
}

// 主题观察者
class Cat implements Observer {
    public function sayHello()
    {
        // TODO: Implement sayHello() method.
        echo "Cat say hello.<br/>";
    }
}

// 主题观察者
class Fish implements Observer {

    public function sayHello()
    {
        // TODO: Implement sayHello() method.
        echo "Fish say hello.<br/>";
    }
}

$action = new Action();
$action->registerObserver(new Cat());
$action->registerObserver(new Fish());
$action->notify();
?>
