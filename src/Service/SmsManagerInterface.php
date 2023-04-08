<?php

namespace SmsApi\SmsApiManager\Service;

use Psr\Log\LogLevel;

interface SmsManagerInterface
{
    public function to(string $sentTo): self;

    public function setBody(string $messageBody): self;

    public function logUsage(string $message, array $context = [], string $level = LogLevel::NOTICE): self;

    public function send(): void;
}
