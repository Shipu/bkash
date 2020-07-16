<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Checkout\PaymentApi;
use Shipu\Bkash\Apis\Checkout\PayoutApi;
use Shipu\Bkash\Apis\Checkout\SupportApi;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Traits\Macroable;

/**
 * Class Tokenized
 * @package Shipu\Bkash\Managers
 */
class Checkout extends BkashManager
{
    use Macroable;
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

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function payment()
    {
        return ( new PaymentApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function payout()
    {
        return ( new PayoutApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function support()
    {
        return ( new SupportApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param string $intent
     * @param string $currency
     * @param null $merchantAssociationInfo
     *
     * @return mixed
     */
    public function createPayment( $amount, $merchantInvoiceNumber, $intent = 'sale', $currency = 'BDT', $merchantAssociationInfo = null )
    {
        $response = $this->paymentApi->authorization($this->getToken())->create($amount, $merchantInvoiceNumber, $intent, $currency, $merchantAssociationInfo);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function executePayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->execute($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function capturePayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->capture($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function queryPayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->queryPayment($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function voidPayment( $paymentId )
    {
        $response = $this->paymentApi->authorization($this->getToken())->void($paymentId);

        return $response();
    }

    /**
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param $receiverMSISDN
     * @param string $currency
     *
     * @return mixed
     */
    public function b2cPayment( $amount, $merchantInvoiceNumber, $receiverMSISDN, $currency = 'BDT' )
    {
        $response = $this->payoutApi->authorization($this->getToken())->b2cPayment($amount, $merchantInvoiceNumber, $receiverMSISDN, $currency);

        return $response();
    }

    /**
     * @return mixed
     */
    public function queryOrganizationBalance()
    {
        $response = $this->supportApi->authorization($this->getToken())->queryOrganizationBalance();

        return $response();
    }

    /**
     * @param $amount
     * @param $transferType
     * @param string $currency
     *
     * @return mixed
     */
    public function intraAccountTransfer( $amount, $transferType, $currency = 'BDT' )
    {
        $response = $this->supportApi->authorization($this->getToken())->intraAccountTransfer($amount, $transferType, $currency);

        return $response();
    }

    /**
     * @param $trxId
     *
     * @return mixed
     */
    public function searchTransaction( $trxId )
    {
        $response = $this->supportApi->authorization($this->getToken())->searchTransaction($trxId);

        return $response();
    }


    /**
     * @param $amount
     * @param $paymentID
     * @param $trxID
     * @param string $reason
     * @param string $sku
     *
     * @return mixed
     */
    public function refundTransaction( $amount, $paymentID, $trxID, $reason, $sku )
    {
        $response = $this->supportApi->authorization($this->getToken())->refundTransaction($amount, $paymentID, $trxID, $reason, $sku);
        
        return $response();
    }

    /**
     * @param $paymentID
     * @param $trxID
     *
     * @return mixed
     */
    public function refundStatus( $paymentID, $trxID )
    {
        $response = $this->supportApi->authorization($this->getToken())->refundStatus( $paymentID, $trxID );
        
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
