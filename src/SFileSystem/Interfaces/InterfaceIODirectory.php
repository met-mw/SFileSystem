<?php
namespace SFileSystem\Interfaces;


interface InterfaceIODirectory extends InterfaceIO
{

    public function createDirectory($directoryName);
    public function createFile($fileName);
    public function getDirectory($directoryName);
    public function getDirectories();
    public function getFile($fileName);
    public function getFiles();
    public function scan($recursive = false);

}