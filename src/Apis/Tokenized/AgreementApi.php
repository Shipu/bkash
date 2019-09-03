<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Apiz\AbstractApi;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Enums\BkashKey;

/**
 * Class AgreementApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class AgreementApi extends TokenizedBaseApi
{
    public function create($payerReference, $callbackUrl = null)
    {
        return $this->json([
            'payerReference' => $payerReference,
            'callbackURL' => is_null($callbackUrl) ? $this->config [BkashKey::CALL_BACK_URL] : $callbackUrl
        ])->post('/agreement/create');
    }

    public function execute( $paymentId )
    {
        return $this->json([
            'paymentID' => $paymentId,
        ])->post('/agreement/execute');
    }

    public function status( $agreementId )
    {
        return $this->json([
            'agreementID' => $agreementId,
        ])->post('/agreement/status');
    }

    public function cancel( $agreementId )
    {
        return $this->json([
            'agreementID' => $agreementId,
        ])->post('/agreement/cancel');
    }

}
