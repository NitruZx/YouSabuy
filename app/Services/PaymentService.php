<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentService {

    public function selectPayment() {
        $room = DB::table('registrations')->select('room_id')->where('client_id', Auth::user()->id)->first();
        $datas = DB::table('payments')
        ->join('rooms', 'payments.room_id', '=', 'rooms.room_id')
        ->join('room_types', 'rooms.type', '=', 'room_types.type')
        ->select('payments.*', DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") AS monthbill'), DB::raw('DATEDIFF(CURRENT_DATE() , payments.due_date) AS diff'),
         DB::raw('DATE_FORMAT(checkout_date, "%d/%m/%Y") AS paiddate, DATE_FORMAT(due_date, "%d/%m/%Y") AS due'),
         'room_types.monthly_price')
        ->where('payments.room_id', $room->room_id)
        ->orderBy('created_at')
        ->get();

        // $datas = DB::table('payments')->where('user_id', Auth::user()->id)->get();
        return $datas;
    }
}