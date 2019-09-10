<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Payment\CheckoutApi;
use Shipu\Bkash\Apis\Payment\DirectApi;
use Shipu\Bkash\Apis\Payment\MandateApi;
use Shipu\Bkash\Apis\Payment\PayoutApi;
use Shipu\Bkash\Apis\Payment\SupportApi;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Traits\Macroable;

/**
 * Class Tokenized
 * @package Shipu\Bkash\Managers
 */
class Payment extends BkashManager
{
    use Macroable;
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

        $this->directApi   = new DirectApi($config);
        $this->supportApi  = new SupportApi($config);
        $this->mandateApi  = new MandateApi($config);
        $this->payoutApi   = new PayoutApi($config);
        $this->checkoutApi = new CheckoutApi($config);
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function direct()
    {
        return ( new DirectApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function support()
    {
        return ( new SupportApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function checkout()
    {
        return ( new CheckoutApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function mandate()
    {
        return ( new MandateApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @return \Apiz\AbstractApi|bool
     */
    public function payout()
    {
        return ( new PayoutApi($this->config) )->authorization($this->getToken());
    }

    /**
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param string $intent
     * @param string $currency
     *
     * @return mixed
     */
    public function createCheckout( $amount, $merchantInvoiceNumber, $intent = 'sale', $currency = 'BDT' )
    {
        $response = $this->checkoutApi->authorization($this->getToken())->create($amount, $merchantInvoiceNumber, $intent, $currency);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function executeCheckout( $paymentId )
    {
        $response = $this->checkoutApi->authorization($this->getToken())->execute($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function captureCheckout( $paymentId )
    {
        $response = $this->checkoutApi->authorization($this->getToken())->capture($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function queryCheckout( $paymentId )
    {
        $response = $this->checkoutApi->authorization($this->getToken())->query($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function voidCheckout( $paymentId )
    {
        $response = $this->checkoutApi->authorization($this->getToken())->void($paymentId);

        return $response();
    }

    /**
     * @param $mandateId
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param $payerReferenceNumber
     * @param string $intent
     * @param string $currency
     *
     * @return mixed
     */
    public function saleOrAuthorize( $mandateId, $amount, $merchantInvoiceNumber, $payerReferenceNumber, $intent = 'sale', $currency = 'BDT' )
    {
        $response = $this->directApi->authorization($this->getToken())->saleOrAuthorize($mandateId, $amount, $merchantInvoiceNumber, $payerReferenceNumber, $intent, $currency);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function captureDirect( $paymentId )
    {
        $response = $this->directApi->authorization($this->getToken())->capture($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function queryDirect( $paymentId )
    {
        $response = $this->directApi->authorization($this->getToken())->query($paymentId);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function voidDirect( $paymentId )
    {
        $response = $this->directApi->authorization($this->getToken())->void($paymentId);

        return $response();
    }

    /**
     * @param $firstPaymentDate
     * @param $frequency
     * @param $payerReferenceNumber
     * @param $requestType
     * @param null $startRangeOfDays
     * @param null $endRangeOfDays
     * @param null $expiryDate
     * @param null $amount
     * @param null $merchantInvoiceNumber
     * @param string $intent
     * @param string $currency
     *
     * @return mixed
     */
    public function createMandate( $firstPaymentDate, $frequency, $payerReferenceNumber, $requestType, $startRangeOfDays = null, $endRangeOfDays = null, $expiryDate = null, $amount = null, $merchantInvoiceNumber = null, $intent = 'sale', $currency = 'BDT' )
    {
        $response = $this->mandateApi->authorization($this->getToken())->create($firstPaymentDate, $frequency, $payerReferenceNumber, $requestType, $startRangeOfDays, $endRangeOfDays, $expiryDate, $amount, $merchantInvoiceNumber, $intent, $currency);

        return $response();
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function executeMandate( $paymentId )
    {
        $response = $this->mandateApi->authorization($this->getToken())->execute($paymentId);

        return $response();
    }

    /**
     * @param $mandateId
     *
     * @return mixed
     */
    public function queryMandate( $mandateId )
    {
        $response = $this->mandateApi->authorization($this->getToken())->query($mandateId);

        return $response();
    }

    /**
     * @param $mandateId
     *
     * @return mixed
     */
    public function cancelMandate( $mandateId )
    {
        $response = $this->mandateApi->authorization($this->getToken())->cancel($mandateId);

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
        $response = $this->payoutApi->authorization($this->getToken())->cancel($amount, $merchantInvoiceNumber, $receiverMSISDN, $currency);

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
     * @param $trxId
     * @param $amount
     * @param string $currency
     *
     * @return mixed
     */
    public function refund( $trxId, $amount, $currency = 'BDT' )
    {
        $response = $this->supportApi->authorization($this->getToken())->refund($trxId, $amount, $currency);

        return $response();
    }

    /**
     * @return string
     */
    protected function subDomainType()
    {
        return BkashSubDomainType::PAYMENT;
    }

}
