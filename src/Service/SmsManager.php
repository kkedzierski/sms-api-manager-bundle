<?php

namespace SmsApi\SmsApiManager\Service;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class SmsManager implements SmsManagerInterface
{
    private ?string $messageBody = null;
    private ?string $sendTo = null;

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly TexterInterface $texter,
    ) {
    }

    public function to(string $sentTo): self
    {
        $this->sendTo = $sentTo;

        return $this;
    }

    public function setBody(string $messageBody): self
    {
        $this->messageBody = $messageBody;

        return $this;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function send(): void
    {
        $sms = $this->provideSms();
        $this->texter->send($sms);
    }

    private function provideSms(): SmsMessage
    {
        if (null === $this->sendTo) {
            throw new \RuntimeException('Declare receiver.');
        }

        if (null === $this->messageBody) {
            throw new \RuntimeException('Declare message body.');
        }

        return new SmsMessage(
            $this->sendTo,
            $this->messageBody,
        );
    }

    public function logUsage(string $message, array $context = [], string $level = LogLevel::NOTICE): self
    {
        $this->logger->log($level, $message, $context);

        return $this;
    }
}
