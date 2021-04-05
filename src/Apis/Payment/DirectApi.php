<?php


namespace Shipu\Bkash\Apis\Payment;


class DirectApi extends PaymentBaseApi
{
    /**
     * @param $mandateId
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param $payerReferenceNumber
     * @param string $intent
     * @param string $currency
     *
     * @return mixed
     */
    public function saleOrAuthorize( $mandateId, $amount, $merchantInvoiceNumber, $payerReferenceNumber, $intent = 'sale', $currency = 'BDT' )
    {
        return $this->withJson([
            'amount'                => $amount,
            'payerReferenceNumber'  => $payerReferenceNumber,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
            'intent'                => $intent,
            'currency'              => $currency
        ])->post('/payment/mandate/' . $mandateId);
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function capture( $paymentId )
    {
        return $this->post('/payment/capture/' . $paymentId);
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function query( $paymentId )
    {
        return $this->get('/payment/query/' . $paymentId);
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function void( $paymentId )
    {
        return $this->get('/payment/void/' . $paymentId);
    }
}
