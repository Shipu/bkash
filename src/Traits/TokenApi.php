<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 1/9/19
 * Time: 11:41 PM
 */

namespace Shipu\Bkash\Traits;

use Shipu\Bkash\Enums\BkashEnum;

trait TokenApi
{
    public function grantToken()
    {
        $tokenResponse = $this->json([
            'app_key'    => $this->config [BkashEnum::APP_KEY],
            'app_secret' => $this->config [BkashEnum::APP_SECRET],
        ])->headers([
            'username'     => $this->config [BkashEnum::USER_NAME],
            'password'     => $this->config [BkashEnum::PASSWORD],
        ])->post('/token/grant');

        return $tokenResponse;
    }

    public function refreshToken($refreshToken)
    {
        $refreshTokenResponse = $this->json([
            'app_key'    => $this->config [BkashEnum::APP_KEY],
            'app_secret' => $this->config [BkashEnum::APP_SECRET],
            'refresh_token' => $refreshToken,
        ])->headers([
            'username'     => $this->config [BkashEnum::USER_NAME],
            'password'     => $this->config [BkashEnum::PASSWORD],
        ])->post('/token/grant');

        return $refreshTokenResponse;
    }
}
