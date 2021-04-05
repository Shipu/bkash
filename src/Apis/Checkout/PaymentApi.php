<?php

namespace Shipu\Bkash\Apis\Checkout;

/**
 * Class PaymentApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class PaymentApi extends CheckoutBaseApi
{

    /**
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param string $intent
     * @param string $currency
     * @param null $merchantAssociationInfo
     *
     * @return mixed
     */
    public function create( $amount, $merchantInvoiceNumber, $intent = 'sale', $currency = 'BDT', $merchantAssociationInfo = null )
    {
        return $this->withJson([
            'amount'                  => $amount,
            'merchantInvoiceNumber'   => $merchantInvoiceNumber,
            'intent'                  => $intent,
            'currency'                => $currency,
            'merchantAssociationInfo' => $merchantAssociationInfo
        ])->post('/payment/create');
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function execute( $paymentId )
    {
        return $this->post('/payment/execute/' . $paymentId);
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function capture( $paymentId )
    {
        return $this->post('/payment/capture/' . $paymentId);
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function queryPayment( $paymentId )
    {
        return $this->get('/payment/query/' . $paymentId);
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function void( $paymentId )
    {
        return $this->post('/payment/void/' . $paymentId);
    }

}
