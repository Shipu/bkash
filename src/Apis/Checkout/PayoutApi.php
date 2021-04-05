<?php

namespace Shipu\Bkash\Apis\Checkout;

/**
 * Class PayoutApi
 * @package Shipu\Bkash\Apis\CheckoutApi
 */
class PayoutApi extends CheckoutBaseApi
{
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
        return $this->withJson([
            'amount'                => $amount,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
            'receiverMSISDN'        => $receiverMSISDN,
            'currency'              => $currency
        ])->post('/payment/b2cPayment');
    }
}
