<?php
namespace SFileSystem\Interfaces;

/**
 * Interface InterfaceIODirectory
 * @package SFileSystem\Interfaces
 */
interface InterfaceIODirectory extends InterfaceIO
{

    /**
     * @param string $directoryName
     * @return InterfaceIODirectory
     */
    public function createDirectory($directoryName);

    /**
     * @param string $fileName
     * @return InterfaceIOFile
     */
    public function createFile($fileName);

    /**
     * @param string $directoryName
     * @return InterfaceIODirectory
     */
    public function getDirectory($directoryName);

    /**
     * @return InterfaceIODirectory[]
     */
    public function getDirectories();

    /**
     * @param string $fileName
     * @return InterfaceIOFile
     */
    public function getFile($fileName);

    /**
     * @return InterfaceIOFile[]
     */
    public function getFiles();

    /**
     * @param bool|false $recursive
     * @return InterfaceIODirectory
     */
    public function scan($recursive = false);

}