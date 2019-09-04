<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Apis\Payment\DirectApi;
use Shipu\Bkash\Apis\Payment\SupportApi;
use Shipu\Bkash\Enums\BkashSubDomainType;

/**
 * Class Tokenized
 * @package Shipu\Bkash\Managers
 */
class Payment extends BkashManager
{
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
     * Payment constructor.
     *
     * @param $config
     */
    public function __construct( $config )
    {
        parent::__construct($config);

        $this->directApi  = new DirectApi($config);
        $this->supportApi = new SupportApi($config);
    }

    /**
     * @return string
     */
    public function subDomainType()
    {
        return BkashSubDomainType::PAYMENT;
    }

    public function direct()
    {
        return ( new DirectApi($this->config) )->authorization($this->getToken());
    }

    public function support()
    {
        return ( new SupportApi($this->config) )->authorization($this->getToken());
    }

}
