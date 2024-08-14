<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nucleos\MatomoBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

final class NucleosMatomoExtension extends Extension
{
    /**
     * @param array<mixed> $configs
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $bundles = $container->getParameter('kernel.bundles');

        $loader = new Loader\PhpFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('services.php');
        $loader->load('twig.php');

        /** @var array<string, mixed> $bundles */
        if (isset($bundles['SonataBlockBundle'])) {
            $loader->load('block.php');
        }

        $this->configureHttpClient($container, $config);
    }

    /**
     * @param array<mixed> $config
     */
    private function configureHttpClient(ContainerBuilder $container, array $config): void
    {
        $container->setAlias('nucleos_matomo.http.client', $config['http']['client']);
        $container->setAlias('nucleos_matomo.http.message_factory', $config['http']['message_factory']);
    }
}
