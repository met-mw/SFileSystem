<?php
namespace SFileSystem\Interfaces;


interface InterfaceIO
{

    public function create();
    public function delete();
    public function exists();
    public function getName();
    public function getParentDirectory();
    public function getPath();
    public function moveTo(InterfaceIODirectory $Directory);
    public function setPath($path);

}