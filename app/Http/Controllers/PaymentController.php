<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
   public function show(Request $request) {
        $datas = (new PaymentService())->selectPayment();
        return view('Client/payment/paymentlist', compact('datas'));
     }
 
   public function checkout(Request $request) {
         $price = $request->totalPrice;
         return redirect()->back()->with('check', 'clicked:)')->with('total', $price);
        // echo "clicked";
   }
}
