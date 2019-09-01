<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Apiz\AbstractApi;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Enums\BkashEnum;

class AgreementApi extends TokenizedBaseApi
{
    protected $authorization = true;

    public function create($payerReference)
    {
        $agreement = $this->json([
            'payerReference' => $payerReference,
            'callbackURL' => $this->config [BkashEnum::CALL_BACK_URL]
        ])->post('/agreement/create');

        return $agreement;
    }
}
