<?php

namespace Evlz\PhpEXIFBundle\Reader;

use PHPExif\Reader\Reader;
use PHPExif\Reader\ReaderInterface;

class ExiftoolReader extends AbstractReader implements ReaderInterface
{
    public function __construct()
    {
        $this->type = Reader::TYPE_EXIFTOOL;
    }
}
