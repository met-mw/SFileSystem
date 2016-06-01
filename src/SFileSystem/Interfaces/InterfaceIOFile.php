<?php
namespace SFileSystem\Interfaces;


interface InterfaceIOFile extends InterfaceIO
{

    public function appendContent($content);
    public function getExtension();
    public function read();
    public function setContent($content);

}