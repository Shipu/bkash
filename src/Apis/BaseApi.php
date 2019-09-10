<?php

namespace Shipu\Bkash\Apis;

use Apiz\AbstractApi;
use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Response\BkashResponse;

/**
 * Class BaseApi
 * @package Shipu\Bkash\Apis
 */
abstract class BaseApi extends AbstractApi
{
    /**
     * @var string
     */
    protected $subDomain = '';

    /**
     * @var string
     */
    protected $env = 'sandbox';

    /**
     * @var string
     */
    protected $response = BkashResponse::class;

    /**
     * @var
     */
    protected $config;

    protected $options = [
        'timeout' => 30
    ];

    /**
     * @var bool
     */
    protected $authorization = false;

    /**
     * BaseApi constructor.
     *
     * @param $config
     */
    public function __construct( $config )
    {
        $this->subDomain = $this->subDomain();
        $this->env       = $config[ BkashKey::SANDBOX ] ? 'sandbox' : 'pay';
        $this->prefix    = '/' . $config[ BkashKey::VERSION ] . $this->urlPrefix();
        $this->config    = $config;

        parent::__construct();
    }

    /**
     * @return mixed
     */
    abstract protected function subDomain();

    /**
     * @return mixed
     */
    abstract protected function urlPrefix();

    /**
     * set base URL for guzzle client
     *
     * @return string
     */
    public function baseUrl()
    {
        $api = $this->subDomain . "." . $this->env;

        return "https://" . $api . ".bka.sh";
    }

    /**
     * @param $token
     *
     * @return AbstractApi|bool
     */
    public function authorization( $token )
    {
        return $this->headers([
            'Authorization' => $token,
            'X-APP-Key'     => $this->config[ BkashKey::APP_KEY ]
        ]);
    }
}
