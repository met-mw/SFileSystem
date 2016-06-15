<?php
namespace SFileSystem\Interfaces;

/**
 * Interface InterfaceIO
 * @package SFileSystem\Interfaces
 */
interface InterfaceIO
{

    /**
     * @return $this
     */
    public function create();

    /**
     * @param InterfaceIODirectory $Directory
     * @return bool
     */
    public function copyTo(InterfaceIODirectory $Directory);

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
     * @return InterfaceIODirectory
     */
    public function getParentDirectory();

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param InterfaceIODirectory $Directory
     * @return bool
     */
    public function moveTo(InterfaceIODirectory $Directory);

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path);

}