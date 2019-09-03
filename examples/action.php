<?php

use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Enums\BkashSubDomainType;

require '../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

$config = include('../config/bkash.php');
$tokenized = new Shipu\Bkash\Managers\Tokenized($config[BkashSubDomainType::TOKENIZED]);

$data = $_POST;

if(!empty($data)) {
    $callbackUrl = $config[BkashSubDomainType::TOKENIZED][BkashKey::CALL_BACK_URL].'?'.http_build_query($data);
    $agreement = $tokenized->createAgreement($data['payerReference'], $callbackUrl);
    header('Location: '.$agreement->bkashURL);
}



