<?php


namespace Shipu\Bkash\Apis\Payment;


class MandateApi extends PaymentBaseApi
{
    public function create( $firstPaymentDate, $frequency, $payerReferenceNumber, $requestType, $startRangeOfDays = null, $endRangeOfDays = null, $expiryDate = null, $amount = null, $merchantInvoiceNumber = null, $intent = 'sale', $currency = 'BDT')
    {
        return $this->json([
            'firstPaymentDate' => $firstPaymentDate,
            'frequency' => $frequency,
            'payerReferenceNumber' => $payerReferenceNumber,
            'requestType' => $requestType,
            'startRangeOfDays' => $startRangeOfDays,
            'endRangeOfDays' => $endRangeOfDays,
            'expiryDate' => $expiryDate,
            'amount' => $amount,
            'currency' => $currency,
            'intent' => $intent,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
        ])->post('/mandate/create');
    }

    public function execute( $paymentId )
    {
        return $this->post('/mandate/execute/'.$paymentId);
    }

    public function query( $mandateId )
    {
        return $this->get('/mandate/query/'.$mandateId);
    }

    public function cancel( $mandateId )
    {
        return $this->post('/mandate/cancel/'.$mandateId);
    }
}
