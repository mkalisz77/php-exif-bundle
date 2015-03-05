<?php

namespace Evlz\PhpEXIFBundle\Tests\DependencyInjection;

use Evlz\PhpEXIFBundle\DependencyInjection\EvlzPhpEXIFExtension;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class EvlzPhpEXIFExtensionTest extends PHPUnit_Framework_TestCase
{
    protected function getExtension()
    {
        return new EvlzPhpEXIFExtension();
    }

    protected function getContainer()
    {
        return new ContainerBuilder();
    }

    protected function getConfigs()
    {
        $configs = array(
            'evlz_php_exif' => array(
                'type' => 'native',
            ),
        );

        return $configs;
    }

    public function testReaders()
    {
        $configs = $this->getConfigs();
        $extension = $this->getExtension();
        $container = new ContainerBuilder();
        $extension->load($configs, $container);
        $this->assertTrue($container->has('evlz_php_exif.reader.native'));
        $this->assertTrue($container->has('evlz_php_exif.reader.exiftool'));
        $this->assertTrue($container->hasAlias('evlz_php_exif.reader.default'));
    }

    public function testDefaultReader()
    {
        $configs = $this->getConfigs();
        $extension = $this->getExtension();
        $container = new ContainerBuilder();
        $extension->load($configs, $container);
        $this->isInstanceOf('Evlz\\PhpEXIFBundle\\Reader\\NativeReader', $container->get('evlz_php_exif.reader.default'));
        $this->isInstanceOf('Evlz\\PhpEXIFBundle\\Reader\\NativeReader', $container->get('evlz_php_exif.reader.native'));
    }

    public function testCustomReader()
    {
        $configs = $this->getConfigs();
        $configs['evlz_php_exif']['type'] = 'exiftool';
        $extension = $this->getExtension();
        $container = new ContainerBuilder();
        $extension->load($configs, $container);
        $this->isInstanceOf('Evlz\\PhpEXIFBundle\\Reader\\ExiftoolReader', $container->get('evlz_php_exif.reader.default'));
        $this->isInstanceOf('Evlz\\PhpEXIFBundle\\Reader\\NativeReader', $container->get('evlz_php_exif.reader.exiftool'));
    }
}
