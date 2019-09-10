<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Checkout\PaymentApi;
use Shipu\Bkash\Apis\Checkout\PayoutApi;
use Shipu\Bkash\Apis\Checkout\SupportApi;
use Shipu\Bkash\Enums\BkashSubDomainType;

/**
 * Class Tokenized
 * @package Shipu\Bkash\Managers
 */
class Checkout extends BkashManager
{
    /**
     *
     * @var SupportApi
     */
    protected $supportApi;

    /**
     *
     * @var PayoutApi
     */
    protected $payoutApi;

    /**
     *
     * @var PaymentApi
     */
    protected $paymentApi;

    /**
     * Tokenized constructor.
     *
     * @param $config
     */
    public function __construct( $config )
    {
        parent::__construct($config);

        $this->supportApi = new SupportApi($config);
        $this->payoutApi  = new PayoutApi($config);
        $this->paymentApi = new PaymentApi($config);
    }

    public function payment()
    {
        return ( new PaymentApi($this->config) )->authorization($this->getToken());
    }

    public function payout()
    {
        return ( new PayoutApi($this->config) )->authorization($this->getToken());
    }

    public function support()
    {
        return ( new SupportApi($this->config) )->authorization($this->getToken());
    }

    public function createPayment( $amount, $merchantInvoiceNumber, $intent = 'sale', $currency = 'BDT', $merchantAssociationInfo = null )
    {
        $response = $this->paymentApi->authorization($this->getToken())->create($amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo);

        return $response();
    }

    public function executePayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->execute($paymentId);

        return $response();
    }

    public function capturePayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->capture($paymentId);

        return $response();
    }

    public function queryPayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->queryPayment($paymentId);

        return $response();
    }

    public function voidPayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->void($paymentId);

        return $response();
    }

    public function b2cPayment( $amount, $merchantInvoiceNumber, $receiverMSISDN, $currency = 'BDT' )
    {
        $response = $this->payoutApi->authorization($this->getToken())->b2cPayment($amount, $merchantInvoiceNumber, $receiverMSISDN, $currency);

        return $response();
    }

    public function queryOrganizationBalance()
    {
        $response = $this->supportApi->authorization($this->getToken())->queryOrganizationBalance();

        return $response();
    }

    public function intraAccountTransfer( $amount, $transferType, $currency = 'BDT' )
    {
        $response = $this->supportApi->authorization($this->getToken())->intraAccountTransfer($amount, $transferType, $currency);

        return $response();
    }

    public function searchTransaction( $trxId )
    {
        $response = $this->supportApi->authorization($this->getToken())->searchTransaction($trxId);

        return $response();
    }

    /**
     * @return string
     */
    protected function subDomainType()
    {
        return BkashSubDomainType::CHECKOUT;
    }

}
