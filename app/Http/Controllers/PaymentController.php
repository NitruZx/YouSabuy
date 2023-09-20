<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function show(Request $request) {
        $datas = (new PaymentService())->selectPayment();
        return view('Client/paymentlist', compact('datas'));
     }
 
    //  public function checkout() {
    //      $datas = (new PaymentService())->selectPayment();
    //     return view('Client/paymentlist', compact('datas'));
    //  }
}
