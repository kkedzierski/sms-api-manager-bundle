<?php

namespace SmsApi\SmsApiManager\Tests\Unit\Service;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use RuntimeException;
use SmsApi\SmsApiManager\Service\SmsManager;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class SmsManagerTest extends TestCase
{
    private MockObject&LoggerInterface $logger;
    private MockObject&TexterInterface $texter;

    private SmsManager $smsManager;
    private function initializeMock(): void
    {
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->texter = $this->createMock(TexterInterface::class);
    }

    protected function setUp(): void
    {
        $this->initializeMock();

        $this->smsManager = new SmsManager(
            $this->logger,
            $this->texter,
        );
    }

    public function testSendSentToNotFoundException(): void
    {
        $this->expectExceptionMessage('Declare receiver.');
        $this->expectException(RuntimeException::class);

        $this->smsManager->send();
    }

    public function testSendMessageBodyNotFoundException(): void
    {
        $this->expectExceptionMessage('Declare message body.');
        $this->expectException(RuntimeException::class);

        $this->smsManager
            ->to('to')
            ->send();
    }

    public function testSend(): void
    {
        $sms = new SmsMessage(
            'to',
            'body',
        );

        $this->logger
            ->expects($this->once())
            ->method('log')
            ->with(
                'error',
                'action',
                ['action' => 'action'],
            );
        $this->texter->expects($this->once())->method('send')->with($sms);

        $this->smsManager
            ->to('to')
            ->setBody('body')
            ->logUsage('action', ['action' => 'action'], 'error')
            ->send();
    }
}
