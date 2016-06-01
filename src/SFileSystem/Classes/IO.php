<?php
namespace SFileSystem\Classes;


use SFileSystem\Interfaces\InterfaceIO;

abstract class IO implements InterfaceIO
{

    protected $path;

    public function __construct($path)
    {
        $this->setPath($path);
    }

    public function getName()
    {
        return basename($this->path);
    }

    public function getParentDirectory()
    {
        return new Directory(dirname($this->path));
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function exists()
    {
        return file_exists($this->path);
    }

    public function delete()
    {
        unlink($this->path);
    }

}