<?php

use Shipu\Bkash\Enums\BkashSubDomainType;
use Shipu\Bkash\Managers\Checkout;

require_once './../composer_load.php';

$data = $_POST;

$checkout = new Checkout($config[BkashSubDomainType::CHECKOUT]);

echo $checkout->payment()->execute($data['paymentId'])->query()->toJson();
