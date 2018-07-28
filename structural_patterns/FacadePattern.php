<?php

/**
 * Interface HardWare
 * 硬件接口
 */
interface HardWare
{
    public function start();
    public function off();
    public function init();
}

/**
 * Class Cpu
 */
class Cpu implements HardWare
{
    private $power = false;
    private $lineStatus = false;

    public function start()
    {
        $this->power = true;
        echo "Cpu power on.<br/>";
        $this->init(true);
        echo "Cpu line linked.<br/>";
    }

    public function off()
    {
        $this->power = false;
        echo "Cpu power off.<br/>";
        $this->init(false);
        echo "Cpu line broken.<br/>";
    }

    public function init($lineStatus = true)
    {
        $this->lineStatus = $lineStatus;
    }
}

/**
 * Class Board
 */
class Board implements HardWare
{
    private $power = false;
    private $lineStatus = false;

    public function start()
    {
        $this->power = true;
        echo "Board power on.<br/>";
        $this->init(true);
        echo "Board line linked.<br/>";
    }

    public function off()
    {
        $this->power = false;
        echo "Board power off.<br/>";
        $this->init(false);
        echo "Board line broken.<br/>";
    }

    public function init($lineStatus = true)
    {
        $this->lineStatus = $lineStatus;
    }
}

/**
 * Class MemoryCard
 */
class MemoryCard implements HardWare
{
    private $power = false;
    private $lineStatus = false;

    public function start()
    {
        $this->power = true;
        echo "Board power on.<br/>";
        $this->init(true);
        echo "Board line linked.<br/>";
    }

    public function off()
    {
        $this->power = false;
        echo "Board power off.<br/>";
        $this->init(false);
        echo "Board line broken.<br/>";
    }

    public function init($lineStatus = true)
    {
        $this->lineStatus = $lineStatus;
    }
}

class Computer
{
    private $cpu;
    private $board;
    private $memoryCard;

    public function __construct()
    {
        $this->cpu = new Cpu();
        $this->board = new Board();
        $this->memoryCard = new MemoryCard();
    }

    public function powerOn()
    {
        echo "=== Read to power on ===<br/>";
        $this->board->start();
        $this->cpu->start();
        $this->memoryCard->start();
        echo "=== Power on OK! ===<br/>";
    }

    public function powerOff()
    {
        echo "=== Read to power off ===<br/>";
        $this->board->off();
        $this->cpu->off();
        $this->memoryCard->off();
        echo "=== Power off OK! ===<br/>";
    }
}

$computer = new Computer();
$computer->powerOn();
$computer->powerOff();