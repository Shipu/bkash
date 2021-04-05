<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Shipu\Bkash\Enums\BkashKey;

/**
 * Class CheckoutApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class CheckoutApi extends TokenizedBaseApi
{
    /**
     * @param $mode
     * @param null $callbackUrl
     * @param null $payerReference
     * @param null $agreementId
     * @param null $amount
     * @param null $merchantInvoiceNumber
     * @param string $currency
     * @param null $intent
     *
     * @return mixed
     */
    public function create( $mode, $callbackUrl = null, $payerReference = null, $agreementId = null, $amount = null, $merchantInvoiceNumber = null, $currency = 'BDT', $intent = null )
    {
        return $this->withJson([
            'mode'                  => $mode,
            'callbackURL'           => is_null($callbackUrl) ? $this->config [ BkashKey::CALL_BACK_URL ] : $callbackUrl,
            'payerReference'        => $payerReference,
            'agreementID'           => $agreementId,
            'amount'                => $amount,
            'currency'              => $currency,
            'intent'                => $intent,
            'merchantInvoiceNumber' => $merchantInvoiceNumber
        ])->post('/create');
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
        ])->post('/execute');
    }
}
