<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenApi;

/**
 * Class TokenizedBaseApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class TokenizedBaseApi extends BaseApi
{
    use TokenApi;

    protected function subDomain()
    {
        return 'tokenized';
    }

    protected function urlPrefix()
    {
        return '/tokenized/checkout/';
    }
}
