<?php

namespace Shipu\Bkash\Apis\Checkout;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenApi;

class CheckoutBaseApi extends BaseApi
{
    use TokenApi;

    protected function subDomain()
    {
        return 'checkout';
    }

    protected function urlPrefix()
    {
        return '/checkout/';
    }
}
