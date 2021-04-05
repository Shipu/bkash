<?php

namespace Shipu\Bkash\Traits;

use Shipu\Bkash\Enums\BkashKey;

/**
 * Trait TokenableApi
 * @package Shipu\Bkash\Traits
 */
trait TokenableApi
{
    /**
     * @return mixed
     */
    public function grantToken()
    {
        $tokenResponse = $this->withJson([
            'app_key'    => $this->config [ BkashKey::APP_KEY ],
            'app_secret' => $this->config [ BkashKey::APP_SECRET ],
        ])->withHeaders([
            'username' => $this->config [ BkashKey::USER_NAME ],
            'password' => $this->config [ BkashKey::PASSWORD ],
        ])->post('/token/grant');

        return $tokenResponse;
    }

    /**
     * @param $refreshToken
     *
     * @return mixed
     */
    public function refreshToken( $refreshToken )
    {
        $refreshTokenResponse = $this->withJson([
            'app_key'       => $this->config [ BkashKey::APP_KEY ],
            'app_secret'    => $this->config [ BkashKey::APP_SECRET ],
            'refresh_token' => $refreshToken,
        ])->withHeaders([
            'username' => $this->config [ BkashKey::USER_NAME ],
            'password' => $this->config [ BkashKey::PASSWORD ],
        ])->post('/token/grant');

        return $refreshTokenResponse;
    }
}
