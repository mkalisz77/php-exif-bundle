<?php

namespace Evlz\PhpEXIFBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('evlz_php_exif');
        $rootNode
            ->children()
                ->scalarNode('type')
                ->defaultValue('native')
                ->validate()
                    ->ifNotInArray(array('native', 'exiftool'))
                    ->thenInvalid('type %s is not supported')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
