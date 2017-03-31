<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class GeoCoderPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('geo.bundle.geocoder.chain_geocoder')) {
            return;
        }

        $definition = $container->getDefinition('geo.bundle.geocoder.chain_geocoder');
        foreach ($container->findTaggedServiceIds('geo.geocoder') as $id => $parameters) {
            $definition->addMethodCall('addGeoCoder', [new Reference($id)]);
        }
    }
}
