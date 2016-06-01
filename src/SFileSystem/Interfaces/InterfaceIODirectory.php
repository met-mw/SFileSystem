<?php
namespace SFileSystem\Interfaces;


interface InterfaceIODirectory extends InterfaceIO
{

    public function createDirectory($directoryName);
    public function createFile($fileName);
    public function getDirectories();
    public function getFiles();
    public function scan($recursive = false);

}