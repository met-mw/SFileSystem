<?php
namespace SFileSystem\Interfaces;

/**
 * Interface InterfaceIOFile
 * @package SFileSystem\Interfaces
 */
interface InterfaceIOFile extends InterfaceIO
{

    /**
     * @param string $content
     * @return $this
     */
    public function appendContent($content);

    /**
     * @return string
     */
    public function getExtension();

    /**
     * @return string
     */
    public function read();

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content);

}