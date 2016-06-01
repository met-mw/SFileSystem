<?php
namespace SFileSystem\Classes;


use SFileSystem\Interfaces\InterfaceIODirectory;

class Directory extends IO implements InterfaceIODirectory
{

    /** @var Directory[] */
    protected $Directories = [];
    /** @var File[] */
    protected $Files = [];

    public function getName()
    {
        return basename($this->getPath());
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = rtrim($path, DIRECTORY_SEPARATOR);
        return $this;
    }

    public function getDirectories()
    {
        return $this->Directories;
    }

    public function getFiles()
    {
        return $this->Files;
    }

    public function getParentDirectory()
    {
        return new Directory(dirname($this->getPath()));
    }

    public function scan($recursive = false)
    {
        $this->Directories = [];
        $this->Files = [];

        $elements = scandir($this->getPath());
        $elements = array_diff($elements, ['.', '..']);

        foreach ($elements as $element) {
            $elementPath = $this->path . DIRECTORY_SEPARATOR . $element;
            if (is_dir($elementPath)) {
                $Directory = new Directory($elementPath);
                $this->Directories[] = $Directory;
                if ($recursive) {
                    $Directory->scan($recursive);
                }
            } else {
                $this->Files[] = new File($this);
            }
        }

        return $this;
    }

    public function create()
    {
        mkdir($this->getPath());
        return $this;
    }

}