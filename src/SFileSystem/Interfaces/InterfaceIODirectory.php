<?php
namespace SFileSystem\Interfaces;


interface InterfaceIODirectory extends InterfaceIO
{

    public function appendDirectory($directoryName);
    public function appendFile($fileName);
    public function scan($recursive = false);

}