<?php

namespace Shipu\Bkash\Apis\Payment;

/**
 * Class SupportApi
 * @package Shipu\Bkash\Apis\CheckoutApi
 */
class SupportApi extends PaymentBaseApi
{

    /**
     * @return mixed
     */
    public function queryOrganizationBalance()
    {
        return $this->get('/payment/organizationBalance');
    }


    /**
     * @param $amount
     * @param $transferType
     * @param string $currency
     *
     * @return mixed
     */
    public function intraAccountTransfer( $amount, $transferType, $currency = 'BDT' )
    {
        return $this->withJson([
            'amount'       => $amount,
            'currency'     => $currency,
            'transferType' => $transferType
        ])->post('/payment/intraAccountTransfer');
    }

    /**
     * @param $trxId
     *
     * @return mixed
     */
    public function searchTransaction( $trxId )
    {
        return $this->get('/payment/search/' . $trxId);
    }

    /**
     * @param $trxId
     * @param $amount
     * @param string $currency
     *
     * @return mixed
     */
    public function refund( $trxId, $amount, $currency = 'BDT' )
    {
        return $this->withJson([
            'amount'   => $amount,
            'currency' => $currency
        ])->post('/payment/refund/' . $trxId);
    }
}
