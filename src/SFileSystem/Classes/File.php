<?php
namespace SFileSystem\Classes;



use SFileSystem\Interfaces\InterfaceIODirectory;
use SFileSystem\Interfaces\InterfaceIOFile;

class File extends IO implements InterfaceIOFile
{

    public function getName()
    {
        return basename($this->getPath());
    }

    public function getExtension()
    {
        return pathinfo($this->getPath(), PATHINFO_EXTENSION);
    }

    public function getParentDirectory()
    {
        return new Directory(dirname($this->getPath()));
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
        return file_exists($this->getPath());
    }

    public function create()
    {
        $handler = fopen($this->getPath(), 'w');
        fclose($handler);

        return $this;
    }

    public function delete()
    {
        unlink($this->path);
        return $this;
    }

    public function appendContent($content)
    {
        file_put_contents($this->getPath(), $content, FILE_APPEND);
        return $this;
    }

    public function setContent($content)
    {
        file_put_contents($this->getPath(), $content);
        return $this;
    }

    public function read()
    {
        return $this->exists() ? file_get_contents($this->path) : null;
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

    public function copyTo(InterfaceIODirectory $Directory)
    {
        if (!$Directory->exists()) {
            return false;
        }

        copy($this->getPath(), $Directory->getPath() . DIRECTORY_SEPARATOR . $this->getName());
        return true;
    }

}