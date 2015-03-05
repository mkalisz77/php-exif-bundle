<?php

namespace Evlz\PhpEXIFBundle\Reader;

use PHPExif\Reader\Reader;
use PHPExif\Reader\ReaderInterface;

abstract class AbstractReader
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var ReaderInterface
     */
    protected $instance;

    /**
     * Reads & parses the EXIF data from given file
     *
     * @param string $file
     *
     * @return \PHPExif\Exif Instance of Exif object with data
     */
    public function read($file)
    {
        return $this->getInstance()->read($file);
    }

    /**
     * @return ReaderInterface
     */
    protected function getInstance()
    {
        if(!isset($this->instance)) {
            $this->instance = Reader::factory($this->type);
        }

        return $this->instance;
    }

    abstract public function __construct();
}
