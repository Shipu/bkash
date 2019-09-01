<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Response\BkashResponse;

abstract class BkashManager
{
    protected $config;

    protected $token = null;

    protected $refreshToken = null;

    protected $response = BkashResponse::class;

    protected $tokenApi;

    public function __construct( $config )
    {
        $this->config = $config;

        $this->tokenApi = new GrantToken($this->subDomainType(), $config);
    }

    abstract public function subDomainType();

    public function getToken()
    {
        if ( is_null($this->token) ) {
            $token = $this->tokenApi->grantToken();

            $this->token        = $token()->id_token;
            $this->refreshToken = $token()->refresh_token;
        }

        return $this->token;
    }

}
