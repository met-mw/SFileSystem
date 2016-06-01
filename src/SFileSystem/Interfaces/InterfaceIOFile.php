<?php
namespace SFileSystem\Interfaces;


interface InterfaceIOFile extends InterfaceIO
{

    public function appendContent($content);
    public function copyTo(InterfaceIODirectory $Directory);
    public function read();
    public function setContent($content);

}