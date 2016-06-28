<?php
namespace SFileSystem;

/**
 * Interface IOInterface
 * @package SFileSystem
 */
interface IOInterface
{

    /**
     * @return $this
     */
    public function create();

    /**
     * @param DirectoryInterface $Directory
     * @return bool
     */
    public function copyTo(DirectoryInterface $Directory);

    /**
     * @return $this
     */
    public function delete();

    /**
     * @return bool
     */
    public function exists();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return DirectoryInterface
     */
    public function getParentDirectory();

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param DirectoryInterface $Directory
     * @return bool
     */
    public function moveTo(DirectoryInterface $Directory);

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path);

}