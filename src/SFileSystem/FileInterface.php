<?php
namespace SFileSystem;

/**
 * Interface FileInterface
 * @package SFileSystem
 */
interface FileInterface extends IOInterface
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