<?php

declare(strict_types=1);

namespace SmsApi\SmsApiManager;

use SmsApi\SmsApiManager\DependencyInjection\SmsApiManagerExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SmsApiManagerBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new SmsApiManagerExtension();
        }

        return $this->extension;
    }
}
