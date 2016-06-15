<?php
namespace SFileSystem\Classes;


use Exception;
use SFileSystem\Interfaces\InterfaceIODirectory;
use SFileSystem\Interfaces\InterfaceIOFile;

/**
 * Class File
 * @package SFileSystem\Classes
 */
class File extends IO implements InterfaceIOFile
{

    /**
     * @param string $content
     * @return File
     */
    public function appendContent($content)
    {
        file_put_contents($this->getPath(), $content, FILE_APPEND);
        return $this;
    }

    /**
     * @param InterfaceIODirectory $Directory
     * @return bool
     */
    public function copyTo(InterfaceIODirectory $Directory)
    {
        if (!$Directory->exists()) {
            return false;
        }

        copy($this->getPath(), $Directory->getPath() . DIRECTORY_SEPARATOR . $this->getName());
        return true;
    }

    /**
     * @return File
     * @throws Exception
     */
    public function create()
    {
        if ($this->exists()) {
            throw new Exception("File \"{$this->getPath()}\" already exists.");
        }

        $handler = fopen($this->getPath(), 'w');
        fclose($handler);

        return $this;
    }

    /**
     * @return File
     */
    public function delete()
    {
        unlink($this->getPath());
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return pathinfo($this->getPath(), PATHINFO_EXTENSION);
    }

    /**
     * @param InterfaceIODirectory $Directory
     * @return bool
     */
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

    /**
     * @return null|string
     */
    public function read()
    {
        return $this->exists() ? file_get_contents($this->path) : null;
    }

    /**
     * @param string $content
     * @return File
     */
    public function setContent($content)
    {
        file_put_contents($this->getPath(), $content);
        return $this;
    }

}