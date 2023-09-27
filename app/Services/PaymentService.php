<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentService {

    public function selectPayment() {
        $room = DB::table('clients')->select('room_id')->where('id', Auth::user()->id)->first();
        // dd($room);
        $datas = DB::table('payments')
        ->join('rooms', 'payments.room_id', '=', 'rooms.room_id')
        ->join('room_types', 'rooms.type', '=', 'room_types.type')
        ->select('payments.*', 'room_types.monthly_price')
        ->where('payments.room_id', $room->room_id)
        ->orderBy('created_at')
        ->get();

        // $datas = DB::table('payments')->where('user_id', Auth::user()->id)->get();
        return $datas;
    }
}