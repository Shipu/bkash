<?php


namespace Shipu\Bkash\Apis;


use Apiz\AbstractApi;
use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Enums\BkashEnum;
use Shipu\Bkash\Response\BkashResponse;

abstract class BaseApi extends AbstractApi
{
    protected $subDomain = '';

    protected $env = 'sandbox';

    protected $response = BkashResponse::class;

    protected $config;

    protected $token;

    protected $authorization = false;

    abstract protected function subDomain();

    abstract protected function urlPrefix();

    public function __construct( $config )
    {
        $this->subDomain = $this->subDomain();
        $this->env = $config[BkashEnum::SANDBOX] ? 'sandbox' : 'pay';
        $this->prefix = '/'. $config[BkashEnum::VERSION]. $this->urlPrefix();
        $this->config = $config;

        parent::__construct();
    }

    /**
     * set base URL for guzzle client
     *
     * @return string
     */
    public function baseUrl()
    {
        $api = $this->subDomain . ".". $this->env;

        return "https://".$api.".bka.sh";
    }

    public function authorization($token)
    {
        return $this->headers([
            'Authorization' => $token,
            'X-APP-Key' => $this->config[BkashEnum::APP_KEY]
        ]);
    }
}
