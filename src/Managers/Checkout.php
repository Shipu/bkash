<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Tokenized\AgreementApi;
use Shipu\Bkash\Apis\Tokenized\CheckoutApi;
use Shipu\Bkash\Apis\Tokenized\SupportApi;
use Shipu\Bkash\Apis\Tokenized\PaymentApi;
use Shipu\Bkash\Enums\BkashSubDomainType;

/**
 * Class Tokenized
 * @package Shipu\Bkash\Managers
 */
class Checkout extends BkashManager
{
    /**
     * @return string
     */
    public function subDomainType()
    {
        return BkashSubDomainType::CHECKOUT;
    }
}
