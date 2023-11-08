<?php

interface MIterator
{
    public function haseNext();

    public function next();
}

class NameIterator implements MIterator
{
    private $_index = 0;
    private $_len = 0;
    private $_data = [];

    public function __construct($arr = ['name', 'age', 'address'])
    {
        $this->_data = $arr;
        $this->_len = count($arr);
        $this->_index = 0;
    }

    public function haseNext()
    {
        return $this->_index < $this->_len - 1;
    }

    public function next()
    {
        if ($this->haseNext()) {
            $this->_index++;
            return $this->_data[$this->_index];
        }
        return null;
    }

    public function current()
    {
        return $this->_data[$this->_index];
    }
}

class Container
{
    private $iterator = null;
    private $data = [];

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return null
     */
    public function getIterator()
    {
        if ($this->iterator == null) {
            $this->iterator = new NameIterator($this->data);
        }
        return $this->iterator;
    }
}

$container = new Container(["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k"]);
echo "我想输出：" . PHP_EOL;
echo $container->getIterator()->current() . PHP_EOL;
while ($container->getIterator()->haseNext()) {
    echo $container->getIterator()->next() . PHP_EOL;
}
