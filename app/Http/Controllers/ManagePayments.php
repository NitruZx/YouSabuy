<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagePayments extends Controller
{
    public function index() {
        $datas = DB::table('payments')
                    ->join('rooms', 'rooms.room_id', 'payments.room_id')
                    ->join('room_types', 'rooms.type', 'room_types.type')
                    ->select('payments.*', 'room_types.monthly_price')
                    ->get();        

        return view('admin/payments/manage-payments', compact('datas'));
    }
}
