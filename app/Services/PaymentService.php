<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentService {

    public function selectPayment() {
        $datas = DB::table('payments')
        ->join('rooms', 'payments.room_id', '=', 'rooms.room_id')
        ->select('payments.*', 'rooms.monthly_price')
        ->get();

        // $datas = DB::table('payments')->where('user_id', Auth::user()->id)->get();
        return $datas;
    }

    public function getTotal(string $date) {
        $datas = DB::table('payments')->where('user_id', Auth::user()->id)
                                    ->where('', )
                                    ->get();//I can't bro
    }
}