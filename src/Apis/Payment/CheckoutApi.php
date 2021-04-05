<?php


namespace Shipu\Bkash\Apis\Payment;


class CheckoutApi extends PaymentBaseApi
{
    /**
     * @param $amount
     * @param $merchantInvoiceNumber
     * @param string $intent
     * @param string $currency
     *
     * @return mixed
     */
    public function create( $amount, $merchantInvoiceNumber, $intent = 'sale', $currency = 'BDT' )
    {
        return $this->withJson([
            'amount'                => $amount,
            'merchantInvoiceNumber' => $merchantInvoiceNumber,
            'intent'                => $intent,
            'currency'              => $currency
        ])->post('/payment/create');
    }

    /**
     * @param $paymentId
     *
     * @return mixed
     */
    public function execute( $paymentId )
    {
        return $this->post('/payment/execute/' . $paymentId);
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

    public function void( $paymentId )
    {
        return $this->get('/payment/void/' . $paymentId);
    }

    /**
     * @return string
     */
    protected function urlPrefix()
    {
        return '/checkout/';
    }
}
