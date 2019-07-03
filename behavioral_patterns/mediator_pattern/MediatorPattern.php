<?php
/**
 * Created by PhpStorm.
 * User: ping123
 * Date: 2019/7/3
 * Time: 10:22
 */

/**
 * Class ChartRoom
 *
 * 充当中介者
 */
class ChartRoom
{
    public static function showMessage(User $user, $message)
    {
        echo $user->getName() . ": " . $message . PHP_EOL;
    }
}


/**
 * Class User
 *
 * 充当信息端点
 */
class User
{
    private $_name = '';

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function sendMessage($words)
    {
        ChartRoom::showMessage($this, $words);
    }
}


$lucy = new User('lucy');
$jose = new User('jose');

$lucy->sendMessage("Hi, Jose!");
$jose->sendMessage("Hello, Lucy!");


