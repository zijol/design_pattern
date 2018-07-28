<?php

class DIR
{
    private $name;
    private $type;
    private $permission;
    private $directoryList;

    public function __construct($name, $type, $permission)
    {
        $this->name = $name;
        $this->type = $type;
        $this->permission = $permission;
        $this->directoryList = [];
    }

    public function addDir($fd)
    {
        if (strtolower($this->type) == "directory"){
            $this->directoryList[] = $fd;
        }
    }

    public function toString()
    {
        if (strtolower($this->type) == "directory"){
            return "Dir: $this->name, Pms: $this->permission";
        }

        return "File: $this->name, Pms: $this->permission";
    }

    public function isDir()
    {
        return strtolower($this->type) == "directory";
    }

    public function getSubFile()
    {
        $subFile = [];

        foreach ($this->directoryList as $dir) {
            if (!$dir->isDir()) {
                $subFile[] = $dir;
            }
        }

        return $subFile;
    }

    public function getSubDir()
    {
        $subDir = [];

        foreach ($this->directoryList as $dir) {
            if ($dir->isDir()) {
                $subDir[] = $dir;
            }
        }

        return $subDir;
    }
}

$rootDir = new DIR('/', 'directory', '0777');
$varDir = new DIR('var/', 'directory', '0777');
$temDir = new DIR('tem/', 'directory', '0777');
$wwwDir = new DIR('www/', 'directory', '0777');
$file1 = new DIR('file1.png', 'file', '0777');
$file2 = new DIR('file2.png', 'file', '0777');
$file3 = new DIR('file3.png', 'file', '0777');
$file4 = new DIR('file4.png', 'file', '0777');
$file5 = new DIR('file5.png', 'file', '0777');
$file6 = new DIR('file6.png', 'file', '0777');

$rootDir->addDir($varDir);
$varDir->addDir($temDir);
$varDir->addDir($wwwDir);
$rootDir->addDir($file1);
$rootDir->addDir($file3);
$varDir->addDir($file2);
$varDir->addDir($file4);
$temDir->addDir($file5);
$wwwDir->addDir($file6);

$varSubDir = $varDir->getSubDir();

foreach ($varSubDir as $dir) {
    echo $dir->toString()."<br/>";
}

$rootSubDir = $rootDir->getSubFile();

foreach ($rootSubDir as $dir) {
    echo $dir->toString()."<br/>";
}
