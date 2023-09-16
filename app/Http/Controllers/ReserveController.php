<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class ReserveController extends Controller
{
    function index(){
        return view('reserve.reserve-room');
    }

    function addinfo(Request $request){

        DB::table('reservations')->insert([
            'Fname'=>$request->input('fname'),
            'Lname'=>$request->input('lname'),
            'Email100'=>$request->input('email'),
            'Checkin_Date'=>$request->input('datecheckin'),
            'Checkout_Date'=>$request->input('datecheckout'),
            'User_ID'=>$request->input('room'),
            'Room'=>$request->input('room'),
            'phone_number'=>$request->input('phone')

        ]);


    }
}
