USAGE
=====

### Bundle use [smsapi notifer](https://github.com/symfony/smsapi-notifier)

### Add DSN to env file if not added after bundle installation

DSN example
-----------
```
SMSAPI_DSN=smsapi://TOKEN@default?from=FROM&fast=FAST&test=TEST
```

where:
- `TOKEN` is your API Token (OAuth)
- `FROM` is the sender name
- `FAST` setting this parameter to "1" (default "0") will result in sending message with the highest priority which ensures the quickest possible time of delivery. Attention! Fast messages cost more than normal messages.
- `TEST` setting this parameter to "1" (default "0") will result in sending message in test mode (message is validated, but not sent).

See your account info at https://ssl.smsapi.pl/

----

### Example usage

```php

use SmsApi\SmsApiManager\Service\SmsManagerInterface;

    public function __construct(
        private readonly SmsManagerInterface $smsManager,
    ) {
    }

   public function sendSms(
        GiftCard $card,
    ): void {
        $this->smsManager
            ->to('phone-number')
            ->setBody('message-body')
            ->logUsage('log-title', ['context' => 'log'], 'level')
            ->send();
    }
```
