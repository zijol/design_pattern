<?php

interface Image
{
    public function display();
}

class RealImage implements Image
{
    private $imageFileName = '';

    public function __construct($fileName)
    {
        $this->imageFileName = $fileName;
        $this->loadFromDisk();
    }

    private function loadFromDisk()
    {
        echo "Loading image[{$this->imageFileName}] from disk ...<br/>";
    }

    public function display()
    {
        echo "Display image[{$this->imageFileName}].<br/>";
    }
}

class ImageProxy implements Image
{
    private $realImage = null;
    private $imageFileName = '';

    public function __construct($fileName)
    {
        $this->imageFileName = $fileName;
    }

    public function display()
    {
        if(!$this->realImage){
            $this->realImage = new RealImage($this->imageFileName);
        }
        $this->realImage->display();
    }
}

$imageProxy = new ImageProxy("file_proxy.jpg");
$imageProxy->display();