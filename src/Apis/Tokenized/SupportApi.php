<?php

namespace Shipu\Bkash\Apis\Tokenized;

/**
 * Class SupportApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class SupportApi extends TokenizedBaseApi
{
    /**
     * @param $trxId
     *
     * @return mixed
     */
    public function searchTransaction( $trxId )
    {
        return $this->withJson([
            'trxID' => $trxId,
        ])->post('/general/searchTransaction');
    }
}
