<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenableApi;

/**
 * Class TokenizedBaseApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class TokenizedBaseApi extends BaseApi
{
    use TokenableApi;

    /**
     * @return mixed|string
     */
    protected function subDomain()
    {
        return 'tokenized';
    }

    /**
     * @return mixed|string
     */
    protected function urlPrefix()
    {
        return '/tokenized/checkout/';
    }
}
