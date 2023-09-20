<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function show(Request $request) {
       $datas = (new PaymentService())->selectPayment();
       return view('Client/payment.paymentlist', compact('datas'));
    }

    public function checkout() {
        $datas = (new PaymentService())->selectPayment();
       return view('Client/payment.paymentlist', compact('datas'));
    }
}
