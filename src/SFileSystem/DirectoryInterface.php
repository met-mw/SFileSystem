<?php
namespace SFileSystem;

/**
 * Interface DirectoryInterface
 * @package SFileSystem
 */
interface DirectoryInterface extends IOInterface
{

    /**
     * @param string $directoryName
     * @return DirectoryInterface
     */
    public function createDirectory($directoryName);

    /**
     * @param string $fileName
     * @return FileInterface
     */
    public function createFile($fileName);

    /**
     * @param string $directoryName
     * @return DirectoryInterface
     */
    public function getDirectory($directoryName);

    /**
     * @return DirectoryInterface[]
     */
    public function getDirectories();

    /**
     * @param string $fileName
     * @return FileInterface
     */
    public function getFile($fileName);

    /**
     * @return FileInterface[]
     */
    public function getFiles();

    /**
     * @param bool|false $recursive
     * @return DirectoryInterface
     */
    public function scan($recursive = false);

}