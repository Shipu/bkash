<?php


namespace Shipu\Bkash\Apis\Payment;


class CheckoutApi extends PaymentBaseApi
{
    protected function urlPrefix()
    {
        return '/checkout/';
    }

    public function create($amount, $merchantInvoiceNumber, $intent = 'sale', $currency = 'BDT')
    {
        return $this->json([
            'amount' => $amount,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
            'intent' => $intent,
            'currency' => $currency
        ])->post('/payment/create');
    }

    public function capture( $paymentId )
    {
        return $this->post('/payment/capture/'.$paymentId);
    }

    public function execute( $paymentId )
    {
        return $this->post('/payment/execute/'.$paymentId);
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
