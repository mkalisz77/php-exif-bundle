<?php

namespace Evlz\PhpEXIFBundle\Reader;

use PHPExif\Reader\Reader;
use PHPExif\Reader\ReaderInterface;

class NativeReader extends AbstractReader implements ReaderInterface
{
    public function __construct()
    {
        $this->type = Reader::TYPE_NATIVE;
    }
}
