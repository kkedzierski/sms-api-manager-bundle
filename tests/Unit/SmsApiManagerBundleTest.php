<?php

namespace SmsApi\SmsApiManager\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmsApi\SmsApiManager\DependencyInjection\SmsApiManagerExtension;
use SmsApi\SmsApiManager\SmsApiManagerBundle;

class SmsApiManagerBundleTest extends TestCase
{
    public function testGetContainerExtension(): void
    {
        $bundle = new SmsApiManagerBundle();

        $this->assertInstanceOf(SmsApiManagerExtension::class, $bundle->getContainerExtension());
    }
}