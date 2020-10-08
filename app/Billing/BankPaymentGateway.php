<?php

namespace App\Billing;

use App\Billing\PaymentGatewayContract;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function charge($amount)
    {
        return [
            'currency'          => $this->currency,
            'bill amount'       => $amount,
            'discount'          => $this->discount,
            'payable amount'    => $amount - $this->discount
        ];
    }
}
