<?php

namespace Shipu\Bkash\Apis\Payment;

use Shipu\Bkash\Apis\BaseApi;
use Shipu\Bkash\Traits\TokenApi;

class PaymentBaseApi extends BaseApi
{
    use TokenApi;

    protected function subDomain()
    {
        return 'direct';
    }

    protected function urlPrefix()
    {
        return '/payments/';
    }
}
