<?php

namespace Shipu\Bkash\Managers;

use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Response\BkashResponse;

/**
 * Class BkashManager
 * @package Shipu\Bkash\Managers
 */
abstract class BkashManager
{

    /**
     * @var
     */
    protected $config;

    /**
     * @var null
     */
    protected $token = null;

    /**
     * @var null
     */
    protected $refreshToken = null;

    /**
     * @var string
     */
    protected $response = BkashResponse::class;

    /**
     * @var GrantToken
     */
    protected $tokenApi;

    /**
     * BkashManager constructor.
     *
     * @param $config
     */
    public function __construct( $config )
    {
        $this->config = $config;

        $this->tokenApi = new GrantToken($this->subDomainType(), $config);
    }

    /**
     * @return mixed
     */
    abstract protected function subDomainType();

    /**
     * @return null |null
     */
    public function getToken()
    {
        if ( is_null($this->token) ) {

            $this->token = collect_value(isset($this->config[ BkashKey::TOKEN ]) ? $this->config[ BkashKey::TOKEN ] : false, array_diff_key($this->config, [ 'token' => '' ]));

            if ( empty($this->token) ) {
                $token = $this->tokenApi->grantToken();

                $this->token        = $token()->id_token;
                $this->refreshToken = $token()->refresh_token;
            }

        }

        return $this->token;
    }

}
