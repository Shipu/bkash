<?php

namespace Shipu\Bkash\Apis\Checkout;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenApi;

/**
 * Class CheckoutBaseApi
 * @package Shipu\Bkash\Apis\CheckoutApi
 */
class CheckoutBaseApi extends BaseApi
{
    use TokenApi;

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
