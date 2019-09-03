<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 1/9/19
 * Time: 11:41 PM
 */

namespace Shipu\Bkash\Traits;

use Shipu\Bkash\Enums\BkashKey;

/**
 * Trait TokenApi
 * @package Shipu\Bkash\Traits
 */
trait TokenApi
{
    /**
     * @return mixed
     */
    public function grantToken()
    {
        $tokenResponse = $this->json([
            'app_key'    => $this->config [BkashKey::APP_KEY],
            'app_secret' => $this->config [BkashKey::APP_SECRET],
        ])->headers([
            'username'     => $this->config [BkashKey::USER_NAME],
            'password'     => $this->config [BkashKey::PASSWORD],
        ])->post('/token/grant');

        return $tokenResponse;
    }

    /**
     * @param $refreshToken
     *
     * @return mixed
     */
    public function refreshToken($refreshToken)
    {
        $refreshTokenResponse = $this->json([
            'app_key'    => $this->config [BkashKey::APP_KEY],
            'app_secret' => $this->config [BkashKey::APP_SECRET],
            'refresh_token' => $refreshToken,
        ])->headers([
            'username'     => $this->config [BkashKey::USER_NAME],
            'password'     => $this->config [BkashKey::PASSWORD],
        ])->post('/token/grant');

        return $refreshTokenResponse;
    }
}
