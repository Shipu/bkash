<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Shipu\Bkash\Enums\BkashKey;

/**
 * Class AgreementApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class AgreementApi extends TokenizedBaseApi
{
    /**
     * @param $payerReference
     * @param null $callbackUrl
     *
     * @return mixed
     */
    public function create( $payerReference, $callbackUrl = null )
    {
        return $this->withJson([
            'payerReference' => $payerReference,
            'callbackURL'    => is_null($callbackUrl) ? $this->config [ BkashKey::CALL_BACK_URL ] : $callbackUrl
        ])->post('/agreement/create');
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
        ])->post('/agreement/execute');
    }

    /**
     * @param $agreementId
     *
     * @return mixed
     */
    public function status( $agreementId )
    {
        return $this->withJson([
            'agreementID' => $agreementId,
        ])->post('/agreement/status');
    }

    /**
     * @param $agreementId
     *
     * @return mixed
     */
    public function cancel( $agreementId )
    {
        return $this->withJson([
            'agreementID' => $agreementId,
        ])->post('/agreement/cancel');
    }

}
