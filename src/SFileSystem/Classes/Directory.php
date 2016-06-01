<?php
namespace SFileSystem\Classes;


use Exception;
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
        if ($this->exists()) {
            throw new Exception("Директория \"{$this->getPath()}\" уже существует.");
        }

        mkdir($this->getPath());
        return $this;
    }

    public function delete()
    {
        if (!$this->exists()) {
            return $this;
        }

        $this->scan();
        foreach ($this->getDirectories() as $Directory) {
            $Directory->delete();
        }

        foreach ($this->getFiles() as $File) {
            $File->delete();
        }

        rmdir($this->path);
        return $this;
    }

    public function moveTo(InterfaceIODirectory $Directory)
    {
        if (!$Directory->exists()) {
            return false;
        }

        $success = false;
        if ($this->copyTo($Directory)) {
            $this->delete();
            $success = true;
        }

        return $success;
    }

    public function createDirectory($directoryName)
    {
        if (!$this->exists()) {
            return null;
        }

        $NewDirectory = new Directory($this->getPath() . DIRECTORY_SEPARATOR . $directoryName);
        return $NewDirectory->create();
    }

    public function createFile($fileName)
    {
        if (!$this->exists()) {
            return null;
        }

        $NewFile = new File($this->getPath() . DIRECTORY_SEPARATOR . $fileName);
        return $NewFile->create();
    }

    public function copyTo(InterfaceIODirectory $Directory)
    {
        if (!$Directory->exists()) {
            return false;
        }

        $NewDirectory = new Directory($Directory->getPath() . DIRECTORY_SEPARATOR . $this->getName());
        $this->scan();
        foreach ($this->getFiles() as $File) {
            if (!$File->copyTo($NewDirectory)) {
                return false;
            }
        }

        foreach ($this->getDirectories() as $Directory) {
            if (!$Directory->copyTo($NewDirectory)) {
                return false;
            }
        }

        return true;
    }

}