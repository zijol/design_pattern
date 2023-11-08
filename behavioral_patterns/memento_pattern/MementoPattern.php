<?php

class Memento
{
    private string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function getState(): string
    {
        return $this->state;
    }
}

class Originator
{
    private string $state;
    private Memento $memento;

    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * 获取当前状态
     * @return string
     */
    public function getStatus(): string
    {
        return $this->state;
    }

    /**
     * 设置当前状态
     * @param $state
     * @return void
     */
    public function setStatus($state): void
    {
        $this->state = $state;
    }

    /**
     * 保存当前状态
     * @return void
     */
    public function saveState(): void
    {
        $this->memento = new Memento($this->state);
    }

    /**
     * 获取真实状态
     * @return string
     */
    public function getRealState(): string
    {
        return $this->memento->getState();
    }
}