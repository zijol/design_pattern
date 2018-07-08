<?php

/**
 * Class SingleObject
 * 单利类
 */
class SingleObject
{
    private static $_instance;

    /**
     * SingleObject constructor.
     * 私有化构造函数，防止直接实例化对象
     * @param array $config
     */
    private function __construct($config = [])
    {
    }

    /**
     * 私有化克隆函数，防止克隆
     */
    private function __clone()
    {
    }

    /**
     * @param array $config
     * 静态化获取实例方法
     * @return SingleObject
     */
    public static function getInstance($config = [])
    {
        if (!self::$_instance instanceof SingleObject) {
            self::$_instance = new SingleObject($config);
        }
        return self::$_instance;
    }

    public function sayHello()
    {
        echo "Hello from SingleObject sayHello() method.<br/>";
    }
}

$singleObject = SingleObject::getInstance();
$singleObject->sayHello();
