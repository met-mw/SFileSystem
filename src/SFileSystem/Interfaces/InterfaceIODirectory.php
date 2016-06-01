<?php
namespace SFileSystem\Interfaces;


interface InterfaceIODirectory extends InterfaceIO
{

    public function createDirectory($directoryName);
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

    public function scan($recursive = false);

}