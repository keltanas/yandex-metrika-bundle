<?php

namespace keltanas\Bundle\YandexMetrikaBundle\DependencyInjection;

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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        // Description metrika params
        // @link http://help.yandex.ru/metrika/objects/creating-object.xml

        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('keltanas_yandex_metrika');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->scalarNode('number')->isRequired()->end()
                ->booleanNode('debug')->defaultValue(false)->end()
                ->arrayNode('params')
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->scalarNode('accurateTrackBounce')->defaultValue(false)->end()
                ->booleanNode('clickmap')->defaultFalse()->end()
                ->booleanNode('defer')->defaultFalse()->end()
                ->booleanNode('enableAll')->defaultFalse()->end()
                ->booleanNode('onlyHttps')->defaultFalse()->end()
                ->booleanNode('trackHash')->defaultFalse()->end()
                ->booleanNode('trackLinks')->defaultFalse()->end()
                ->integerNode('type')->defaultValue(0)->end()
                ->scalarNode('ut')->defaultValue(null)->end()
                ->booleanNode('webvisor')->defaultFalse()->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
