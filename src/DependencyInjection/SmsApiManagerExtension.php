<?php

namespace SmsApi\SmsApiManager\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SmsApiManagerExtension extends Extension
{
    /**
     * @param array<mixed, mixed> $configs
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $servicesLoader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $servicesLoader->load('services.xml');
    }
}
