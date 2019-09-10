<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Checkout\CheckoutBaseApi;
use Shipu\Bkash\Apis\Payment\PaymentBaseApi;
use Shipu\Bkash\Apis\Tokenized\TokenizedBaseApi;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Traits\Macroable;

/**
 * Class GrantToken
 * @package Shipu\Bkash\Managers
 */
class GrantToken
{
    use Macroable;

    protected $tokenApi;

    /**
     * GrantToken constructor.
     *
     * @param $type
     * @param $config
     */
    public function __construct( $type, $config )
    {
        switch ( $type ) {
            case BkashSubDomainType::TOKENIZED:
                $this->tokenApi = new TokenizedBaseApi($config);
                break;
            case BkashSubDomainType::CHECKOUT:
                $this->tokenApi = new CheckoutBaseApi($config);
                break;
            case BkashSubDomainType::PAYMENT:
                $this->tokenApi = new PaymentBaseApi($config);
                break;
        }
    }

    /**
     * @return mixed
     */
    public function grantToken()
    {
        return $this->tokenApi->grantToken();
    }

    /**
     * @param $refreshToken
     *
     * @return mixed
     */
    public function refreshToken( $refreshToken )
    {
        return $this->tokenApi->refreshToken($refreshToken);
    }
}
