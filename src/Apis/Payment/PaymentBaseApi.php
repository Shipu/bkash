<?php

namespace Shipu\Bkash\Apis\Payment;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenableApi;

/**
 * Class PaymentBaseApi
 * @package Shipu\Bkash\Apis\Payment
 */
class PaymentBaseApi extends BaseApi
{
    use TokenableApi;

    /**
     * @return string
     */
    protected function subDomain()
    {
        return 'direct';
    }

    /**
     * @return string
     */
    protected function urlPrefix()
    {
        return '/payments/';
    }
}
