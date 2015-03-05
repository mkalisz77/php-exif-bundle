<?php

namespace Evlz\PhpEXIFBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Evlz\PhpEXIFBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $config;

    public function testMissedType()
    {
        $configs = array(
            //empty
        );
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);
        $this->assertArrayHasKey('type', $config);
        $this->assertEquals('native', $config['type']);
    }

    public function testNativeType()
    {
        $configs = array(
            'evlz_php_exif' => array(
                'type' => 'native',
            ),
        );
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);
        $this->assertArrayHasKey('type', $config);
        $this->assertEquals('native', $config['type']);
    }
    
    public function testExiftoolType()
    {
        $configs = array(
            'evlz_php_exif' => array(
                'type' => 'exiftool',
            ),
        );
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);
        $this->assertArrayHasKey('type', $config);
        $this->assertEquals('exiftool', $config['type']);
    }
}
