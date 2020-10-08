<?php

namespace App\Http\Controllers;

use App\Orders\OrderDetails;
use Illuminate\Http\Request;
use App\Billing\PaymentGatewayContract;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {
        // dd($paymentGateway->charge(500));
        $orderDetails->all();
        dd($paymentGateway->charge(500));
        // dd((new PaymentGateway('usd'))->charge(500));
    }
}
