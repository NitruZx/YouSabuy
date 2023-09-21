<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentService {

    public function selectPayment() {
        $datas = DB::table('payments')->where('user_id', Auth::user()->id)->get();
        return $datas;
    }

    public function getTotal(string $date) {
        $datas = DB::table('payments')->where('user_id', Auth::user()->id)
                                    ->where('', )
                                    ->get();//I can't bro
    }
}