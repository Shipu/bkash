<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Payment\CheckoutApi;
use Shipu\Bkash\Apis\Payment\DirectApi;
use Shipu\Bkash\Apis\Payment\MandateApi;
use Shipu\Bkash\Apis\Payment\PayoutApi;
use Shipu\Bkash\Apis\Payment\SupportApi;
use Shipu\Bkash\Enums\BkashSubDomainType;

/**
 * Class Tokenized
 * @package Shipu\Bkash\Managers
 */
class Payment extends BkashManager
{
    /**
     *
     * @var DirectApi
     */
    protected $directApi;

    /**
     *
     * @var SupportApi
     */
    protected $supportApi;

    /**
     *
     * @var CheckoutApi
     */
    protected $checkoutApi;

    /**
     *
     * @var PayoutApi
     */
    protected $payoutApi;

    /**
     *
     * @var MandateApi
     */
    protected $mandateApi;

    /**
     * Payment constructor.
     *
     * @param $config
     */
    public function __construct( $config )
    {
        parent::__construct($config);

        $this->directApi  = new DirectApi($config);
        $this->supportApi = new SupportApi($config);
        $this->mandateApi = new MandateApi($config);
        $this->payoutApi = new PayoutApi($config);
        $this->checkoutApi = new CheckoutApi($config);
    }

    /**
     * @return string
     */
    protected function subDomainType()
    {
        return BkashSubDomainType::PAYMENT;
    }

    public function direct()
    {
        return ( new DirectApi($this->config) )->authorization($this->getToken());
    }

    public function support()
    {
        return ( new SupportApi($this->config) )->authorization($this->getToken());
    }

    public function checkout()
    {
        return ( new CheckoutApi($this->config) )->authorization($this->getToken());
    }

    public function mandate()
    {
        return ( new MandateApi($this->config) )->authorization($this->getToken());
    }

    public function payout()
    {
        return ( new PayoutApi($this->config) )->authorization($this->getToken());
    }

}
