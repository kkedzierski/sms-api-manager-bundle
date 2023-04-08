<?php

namespace SmsApi\SmsApiManager\Tests\Functional;

use SmsApi\SmsApiManager\SmsApiManagerBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class SmsApiManagerTestKernel extends Kernel
{

    public function registerBundles(): iterable
    {
        return [
            new SmsApiManagerBundle()
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
    }
}