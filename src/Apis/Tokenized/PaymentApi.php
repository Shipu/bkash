<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Shipu\Bkash\Enums\BkashKey;

/**
 * Class PaymentApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class PaymentApi extends TokenizedBaseApi
{
    /**
     * @param $agreementId
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param $intent
     * @param string $currency
     * @param null $callbackUrl
     *
     * @return mixed
     */
    public function create( $agreementId, $amount, $merchantInvoiceNumber, $callbackUrl = null, $intent = 'sale', $currency = 'BDT' )
    {
        return $this->withJson([
            'agreementID'           => $agreementId,
            'amount'                => $amount,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
            'intent'                => $intent,
            'currency'              => $currency,
            'callbackURL'           => is_null($callbackUrl) ? $this->config [ BkashKey::CALL_BACK_URL ] : $callbackUrl
        ])->post('/payment/create');
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function execute( $paymentId )
    {
        return $this->withJson([
            'paymentID' => $paymentId,
        ])->post('/payment/execute');
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function status( $paymentId )
    {
        return $this->withJson([
            'paymentID' => $paymentId,
        ])->post('/payment/status');
    }
}
