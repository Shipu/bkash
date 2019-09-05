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

This package is required some configurations.

#### For Tokenized

**Create Tokenized Instance Using Enum**
```php
$tokenizedConfig = [
    BkashKey::SANDBOX       => true/false,
    BkashKey::VERSION       => "v1.2.0-beta",
    BkashKey::APP_KEY       => "your app key (bkash will provide when on-boarding)",
    BkashKey::APP_SECRET    => "your app secret (bkash will provide when on-boarding)",
    BkashKey::USER_NAME     => "you user name (bkash will provide when on-boarding)",
    BkashKey::PASSWORD      => "your password (bkash will provide when on-boarding)",
    BkashKey::CALL_BACK_URL => "your call back url where you can write your logic",
];

$tokenized = new Tokenized($tokenizedConfig);
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
        BkashKey::APP_KEY       => "your app key (bkash will provide when on-boarding)",
        BkashKey::APP_SECRET    => "your app secret (bkash will provide when on-boarding)",
        BkashKey::USER_NAME     => "you user name (bkash will provide when on-boarding)",
        BkashKey::PASSWORD      => "your password (bkash will provide when on-boarding)",
        BkashKey::CALL_BACK_URL => "your call back url where you can write your logic",
    ],
    BkashSubDomainType::CHECKOUT => [
        BkashKey`::SANDBOX       => true/false,
        BkashKey::VERSION       => "v1.2.0-beta",
        BkashKey::APP_KEY       => "your app key (bkash will provide when on-boarding)",
        BkashKey::APP_SECRET    => "your app secret (bkash will provide when on-boarding)",
        BkashKey::USER_NAME     => "you user name (bkash will provide when on-boarding)",
        BkashKey::PASSWORD      => "your password (bkash will provide when on-boarding)",
        BkashKey::CALL_BACK_URL => "your call back url where you can write your logic",
        BkashKey::SANDBOX_SCRIPT => "your script url (bkash will provide when on-boarding)",
        BkashKey::PRODUCTION_SCRIPT => "your production script url (bkash will provide when on-boarding)",
    ],
    BkashSubDomainType::PAYMENT => [
        BkashKey::SANDBOX       => true/false,
        BkashKey::VERSION       => "v1.2.0-beta",
        BkashKey::APP_KEY       => "your app key (bkash will provide when on-boarding)",
        BkashKey::APP_SECRET    => "your app secret (bkash will provide when on-boarding)",
        BkashKey::USER_NAME     => "you user name (bkash will provide when on-boarding)",
        BkashKey::PASSWORD      => "your password (bkash will provide when on-boarding)",
        BkashKey::CALL_BACK_URL => "your call back url where you can write your logic",
    ]
];

$tokenized = new Tokenized($config[BkashSubDomainType::TOKENIZED]);
$checkout = new Checkout($config[BkashSubDomainType::CHECKOUT]);
$payment = new Payment($config[BkashSubDomainType::PAYMENT]);
```
