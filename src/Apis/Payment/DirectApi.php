<?php


namespace Shipu\Bkash\Apis\Payment;


class DirectApi extends PaymentBaseApi
{
    public function saleOrAuthorize( $mandateId, $amount, $merchantInvoiceNumber, $payerReferenceNumber, $intent = 'sale', $currency = 'BDT')
    {
        return $this->json([
            'amount' => $amount,
            'payerReferenceNumber' => $payerReferenceNumber,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
            'intent' => $intent,
            'currency' => $currency
        ])->post('/payment/mandate/'.$mandateId);
    }

    public function capture( $paymentId )
    {
        return $this->post('/payment/capture/'.$paymentId);
    }

    public function query( $paymentId )
    {
        return $this->get('/payment/query/'.$paymentId);
    }

    public function void( $paymentId )
    {
        return $this->get('/payment/void/'.$paymentId);
    }
}
