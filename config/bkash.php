<?php

use Shipu\Bkash\Enums\BkashKey;

return [
    "tokenize" => [
        BkashKey::SANDBOX       => env("BKASH_TOKENIZE_SANDBOX", true),
        BkashKey::VERSION       => env("BKASH_TOKENIZE_VERSION", "v1.2.0-beta"),
        BkashKey::APP_KEY       => env("BKASH_TOKENIZE_APP_KEY", ""),
        BkashKey::APP_SECRET    => env("BKASH_TOKENIZE_APP_SECRET", ""),
        BkashKey::USER_NAME     => env("BKASH_TOKENIZE_USER_NAME", ""),
        BkashKey::PASSWORD      => env("BKASH_TOKENIZE_PASSWORD", ""),
        BkashKey::CALL_BACK_URL => env("BKASH_TOKENIZE_CALL_BACK_URL", ""),
    ],
    'checkout' => [
        BkashKey::SANDBOX       => env("BKASH_CHECKOUT_SANDBOX", true),
        BkashKey::VERSION       => env("BKASH_CHECKOUT_VERSION", "v1.2.0-beta"),
    ]
];
