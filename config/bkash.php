<?php

use Shipu\Bkash\Enums\BkashEnum;

return [
    "tokenize" => [
        BkashEnum::SANDBOX       => env("BKASH_TOKENIZE_SANDBOX", true),
        BkashEnum::VERSION       => env("BKASH_TOKENIZE_VERSION", "v1.2.0-beta"),
        BkashEnum::APP_KEY       => env("BKASH_TOKENIZE_APP_KEY", ""),
        BkashEnum::APP_SECRET    => env("BKASH_TOKENIZE_APP_SECRET", ""),
        BkashEnum::USER_NAME     => env("BKASH_TOKENIZE_USER_NAME", ""),
        BkashEnum::PASSWORD      => env("BKASH_TOKENIZE_PASSWORD", ""),
        BkashEnum::CALL_BACK_URL => env("BKASH_TOKENIZE_CALL_BACK_URL", ""),
    ]
];
