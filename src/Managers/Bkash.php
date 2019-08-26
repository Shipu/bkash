<?php

namespace Shipu\Bkash\Managers;

use Apiz\AbstractApi;
use Shipu\Bkash\Response\BkashResponse;

class Bkash extends AbstractApi
{
    protected $response = BkashResponse::class;
    protected $version;

    protected $token;
    protected $refreshToken;

    public function __construct()
    {
        $this->prefix = '/v1.2.0-beta/tokenized';
        parent::__construct();
    }

    /**
     * set base URL for guzzle client
     *
     * @return string
     */
    protected function baseUrl()
    {
        return "https://tokenized.sandbox.bka.sh";
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken( $token )
    {
        $this->token = $token;

        return $this;
    }

    public function setVersion( $version )
    {
        $this->version = $version;

        return $this;
    }

    public function grantToken()
    {
        $tokenResponse = $this->json([
            'app_key'    => '7epj60ddf7id0chhcm3vkejtab',
            'app_secret' => '18mvi27h9l38dtdv110rq5g603blk0fhh5hg46gfb27cp2rbs66f',
        ])->headers([
            'username'     => 'sandboxTokenizedUser01',
            'password'     => 'sandboxTokenizedUser12345',
            'Content-Type' => 'application/json'
        ])->post('/checkout/token/grant');

        $this->token        = $tokenResponse()->id_token;
        $this->refreshToken = $tokenResponse()->refresh_token;

        return $tokenResponse->response();
    }
}
