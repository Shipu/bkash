<?php

namespace Shipu\Bkash\Apis\Tokenized;

/**
 * Class GeneralApi
 * @package Shipu\Bkash\Apis\Tokenized
 */
class GeneralApi extends TokenizedBaseApi
{
    /**
     * @param $trxId
     *
     * @return mixed
     */
    public function searchTransaction( $trxId )
    {
        return $this->json([
            'trxID' => $trxId,
        ])->post('/general/searchTransaction');
    }
}
