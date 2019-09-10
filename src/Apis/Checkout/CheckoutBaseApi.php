<?php

namespace Shipu\Bkash\Apis\Checkout;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenableApi;

/**
 * Class CheckoutBaseApi
 * @package Shipu\Bkash\Apis\CheckoutApi
 */
class CheckoutBaseApi extends BaseApi
{
    use TokenableApi;

    /**
     * @return string
     */
    protected function subDomain()
    {
        return 'checkout';
    }

    /**
     * @return string
     */
    protected function urlPrefix()
    {
        return '/checkout/';
    }
}
