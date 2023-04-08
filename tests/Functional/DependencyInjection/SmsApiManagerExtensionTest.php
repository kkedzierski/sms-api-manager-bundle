<?php

namespace SmsApi\SmsApiManager\Tests\Functional\DependencyInjection;

use SmsApi\SmsApiManager\Service\SmsManager;
use SmsApi\SmsApiManager\Tests\Functional\SmsApiManagerTestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SmsApiManagerExtensionTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return SmsApiManagerTestKernel::class;
    }

    public function testInitBundle(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();
        $smsManager = $container->get('SmsApi\SmsApiManager\Service\SmsApiManagerInterface');

        $this->assertTrue($container->has('SmsApi\SmsApiManager\Service\SmsApiManagerInterface'));
        $this->assertInstanceOf(SmsManager::class, $smsManager);
    }
}
