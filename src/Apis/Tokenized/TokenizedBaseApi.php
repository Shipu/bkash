<?php

namespace Shipu\Bkash\Apis\Tokenized;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\SetAuthorizationHeader;
use Shipu\Bkash\Traits\TokenApi;

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
