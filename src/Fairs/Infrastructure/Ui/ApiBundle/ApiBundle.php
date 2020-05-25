<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class ApiBundle
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class ApiBundle extends Bundle
{

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator($this->getConfigDir()));
        $loader->load('config.yml');
    }

    private function getConfigDir()
    {
        return __DIR__ . '/Resources/config';
    }
}
