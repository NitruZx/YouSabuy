<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show() {
       $datas = DB::table('payments')->where('user_id', Auth::user()->id)->get();
       return view('Client/paymentlist', compact('datas'));
    }
}
