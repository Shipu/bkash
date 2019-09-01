<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Tokenized\AgreementApi;
use Shipu\Bkash\Enums\BkashSubDomainType;

class Tokenized extends BkashManager
{
    protected $agreementApi;

    public function __construct($config)
    {
        parent::__construct($config);

        $this->agreementApi = $this->agreement();
    }

    public function subDomainType()
    {
        return BkashSubDomainType::TOKENIZED;
    }

    public function agreement()
    {
        return (new AgreementApi($this->config))->authorization($this->getToken());
    }

    public function createAgreement($payerReference)
    {
        $response = $this->agreementApi->create($payerReference);

        return $response();
    }
}
