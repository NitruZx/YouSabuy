<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentController extends Controller
{
   public function show(Request $request)
   {
      $datas = (new PaymentService())->selectPayment();
      return view('Client/payment/paymentlist', compact('datas'));
   }

   public function checkout(Request $request)
   {
      $data = DB::table('payments')->where('bill_id', $request->bill_id)->first();
      $room = DB::table('rooms')
               ->join('room_types', 'rooms.type', '=', 'room_types.type')
               ->where('room_id', $request->room_id)->first();
      $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
      $total = $room->monthly_price + $request->utility_price;
      $checkout_session = $stripe->checkout->sessions->create([
         'line_items' => [[
            'price_data' => [
               'currency' => 'thb',
               'product_data' => [
                  'name' => "Room : ".$data->room_id,
               ],
               'unit_amount' => $total * 100,
            ],
            'quantity' => 1,
         ]],
         'mode' => 'payment',
         'success_url' => route('checkout.success', [], true)."?bill_id={$request->bill_id}",
         'cancel_url' => route('checkout.success', [], true),
      ]);

      return redirect($checkout_session->url);

      // route('checkout.success', [], true)."?session_id={CHECKOUT_SESSION_ID}&state=success&bill_id={$request->bill_id}
      // $price = $request->totalPrice;
      // return redirect()->back()->with('check', 'clicked:)')->with('total', $price);
      // echo "clicked";
   }

   public function success(Request $request) {
      // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
      // $sessionId = $request->get('session_id');
      // $status = $request->get('state');
      $bill_id = $request->bill_id;
      
      $payment = Payment::where('bill_id', $bill_id)->where('status', 'unpaid')->first();
      if (!$payment) {
         throw new NotFoundHttpException();
      }
      $todayDate = date("Y-m-d");
      $payment->status = 'paid';
      $payment->paydate = $todayDate;
      $payment->save();
      return redirect()->back();
      // try{
      //    $session = \Stripe\Checkout\Session::retrieve($sessionId);
      //    if (!$session) {
      //    throw new NotFoundHttpException();
      //    }
         
      // }catch(\Exception $e) {
      //    throw new NotFoundHttpException();
      // }
      
      // return redirect()->back();
   }
   
   public function cancel() {
      echo "cancel";
   }
}
