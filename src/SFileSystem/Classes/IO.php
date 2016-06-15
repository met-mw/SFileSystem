<?php
namespace SFileSystem\Classes;


use SFileSystem\Interfaces\InterfaceIO;

/**
 * Class IO
 * @package SFileSystem\Classes
 */
abstract class IO implements InterfaceIO
{

    /** @var string */
    protected $path;

    /**
     * IO constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->setPath($path);
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return file_exists($this->path);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return basename($this->path);
    }

    /**
     * @return Directory
     */
    public function getParentDirectory()
    {
        return new Directory(dirname($this->path));
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

}