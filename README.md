# PHP Bkash Payment Client

bkash is a PHP client for Bkash Payment Gateway API. This package is also support in Laravel.

## Installation

Go to terminal and run this command

```shell
composer require shipu/bkash
```

Wait for few minutes. Composer will automatically install this package for your project.

### For Laravel

Below **Laravel 5.5** open `config/app` and add this line in `providers` section

```php
Shipu\Bkash\BkashServiceProvider::class,
```

For Facade support you have add this line in `aliases` section.

```php
'Tokenized'   =>  Shipu\Bkash\Facades\Tokenized::class,
'Checkout'   =>  Shipu\Bkash\Facades\Checkout::class,
'Payment'   =>  Shipu\Bkash\Facades\Payment::class,
```

Then run this command

```shell
php artisan vendor:publish --provider="Shipu\Bkash\BkashServiceProvider"
```

## Configuration

This package is required some configurations and bkash will provide when on-boarding. 

#### For Tokenized

**Create Tokenized Api Instance Using Enum**
```php
use Shipu\Bkash\Managers\Tokenized;
use Shipu\Bkash\Enums\BkashKey;

$tokenizedConfig = [
    BkashKey::SANDBOX       => true/false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "your app key",
    BkashKey::APP_SECRET    => "your app secret",
    BkashKey::USER_NAME     => "you user name",
    BkashKey::PASSWORD      => "your password",
    BkashKey::CALL_BACK_URL => "your call back url where you can write your logic",
];

$tokenized = new Tokenized($tokenizedConfig);
```

**Create Checkout Api Instance Using Enum**
```php
use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Enums\BkashKey;

$checkoutConfig = [
    BkashKey::SANDBOX       => true/false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "your app key",
    BkashKey::APP_SECRET    => "your app secret",
    BkashKey::USER_NAME     => "you user name",
    BkashKey::PASSWORD      => "your password",
    BkashKey::SANDBOX_SCRIPT => "your sandbox script url"
    BkashKey::PRODUCTION_SCRIPT => "your production script url",
];

$checkout = new Checkout($checkoutConfig);
```

**Create Payment Api Instance Using Enum**
```php
use Shipu\Bkash\Managers\Payment;
use Shipu\Bkash\Enums\BkashKey;

$paymentConfig = [
    BkashKey::SANDBOX       => true/false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "your app key",
    BkashKey::APP_SECRET    => "your app secret",
    BkashKey::USER_NAME     => "you user name",
    BkashKey::PASSWORD      => "your password"
];

$payment = new Payment($paymentConfig);
```

**Try with other way:**
```php
use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Managers\Tokenized;
use Shipu\Bkash\Managers\Checkout;
use Shipu\Bkash\Managers\Payment;

$config = [
    BkashSubDomainType::TOKENIZED => [
        BkashKey::SANDBOX       => true/false,
        BkashKey::VERSION       => "v1.2.0-beta",
        BkashKey::APP_KEY       => "your app key",
        BkashKey::APP_SECRET    => "your app secret",
        BkashKey::USER_NAME     => "you user name",
        BkashKey::PASSWORD      => "your password",
        BkashKey::CALL_BACK_URL => "your call back url where you can write your logic",
    ],
    BkashSubDomainType::CHECKOUT => [
        BkashKey`::SANDBOX       => true/false,
        BkashKey::VERSION       => "v1.2.0-beta",
        BkashKey::APP_KEY       => "your app key",
        BkashKey::APP_SECRET    => "your app secret",
        BkashKey::USER_NAME     => "you user name",
        BkashKey::PASSWORD      => "your password",
        BkashKey::SANDBOX_SCRIPT => "your script url",
        BkashKey::PRODUCTION_SCRIPT => "your production script url (bkash will provide when on-boarding)",
    ],
    BkashSubDomainType::PAYMENT => [
        BkashKey::SANDBOX       => true/false,
        BkashKey::VERSION       => "v1.2.0-beta",
        BkashKey::APP_KEY       => "your app key",
        BkashKey::APP_SECRET    => "your app secret",
        BkashKey::USER_NAME     => "you user name",
        BkashKey::PASSWORD      => "your password"
    ]
];

$tokenized = new Tokenized($config[BkashSubDomainType::TOKENIZED]);
$checkout = new Checkout($config[BkashSubDomainType::CHECKOUT]);
$payment = new Payment($config[BkashSubDomainType::PAYMENT]);
```

## Tokenized Api

you may try tokenized demo. 

#### Agreement Api

***Create Agreement***
```php
$payerReference = 'your payerReference';
$callbackUrl = 'merchant callback url';

$agreement = $tokenized->agreement()->create($payerReference, $callbackUrl);

or 

$agreement = $tokenized->createAgreement($payerReference, $callbackUrl);
```
`$callbackUrl` optional.

***Execute Agreement***
```php
$paymentId = 'you can get paymentId after create agreement api call';

$agreement = $tokenized->agreement()->execute($paymentId);

or 

$agreement = $tokenized->executeAgreement($paymentId);
```

***Agreement Status***
```php
$agreementId = 'you can get agreementId after execute agreement api call';

$agreement = $tokenized->agreement()->status($agreementId);

or 

$agreement = $tokenized->statusAgreement($agreementId);
```

***Cancel Agreement***
```php
$agreementId = 'you can get agreementId after execute agreement api call';

$agreement = $tokenized->agreement()->cancel($agreementId);

or 

$agreement = $tokenized->cancelAgreement($agreementId);
```
