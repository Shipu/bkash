<?php


namespace Shipu\Bkash\Apis\Payment;


class MandateApi extends PaymentBaseApi
{
    /**
     * @param $firstPaymentDate
     * @param $frequency
     * @param $payerReferenceNumber
     * @param $requestType
     * @param null $startRangeOfDays
     * @param null $endRangeOfDays
     * @param null $expiryDate
     * @param null $amount
     * @param null $merchantInvoiceNumber
     * @param string $intent
     * @param string $currency
     *
     * @return mixed
     */
    public function create( $firstPaymentDate, $frequency, $payerReferenceNumber, $requestType, $startRangeOfDays = null, $endRangeOfDays = null, $expiryDate = null, $amount = null, $merchantInvoiceNumber = null, $intent = 'sale', $currency = 'BDT' )
    {
        return $this->withJson([
            'firstPaymentDate'      => $firstPaymentDate,
            'frequency'             => $frequency,
            'payerReferenceNumber'  => $payerReferenceNumber,
            'requestType'           => $requestType,
            'startRangeOfDays'      => $startRangeOfDays,
            'endRangeOfDays'        => $endRangeOfDays,
            'expiryDate'            => $expiryDate,
            'amount'                => $amount,
            'currency'              => $currency,
            'intent'                => $intent,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
        ])->post('/mandate/create');
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function execute( $paymentId )
    {
        return $this->post('/mandate/execute/' . $paymentId);
    }

    /**
     * @param $mandateId
     *
     * @return mixed
     */
    public function query( $mandateId )
    {
        return $this->get('/mandate/query/' . $mandateId);
    }

    /**
     * @param $mandateId
     *
     * @return mixed
     */
    public function cancel( $mandateId )
    {
        return $this->post('/mandate/cancel/' . $mandateId);
    }
}
