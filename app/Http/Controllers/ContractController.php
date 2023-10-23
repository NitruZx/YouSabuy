<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    function showw(Request $request){
        $room = DB::table('registrations')->where('client_id', '=', Auth::user()->id)->first();
        return view('contract/contract', compact('room'));
    }


    function addcontract(Request $request){
        $contract = new Contract;
        $contract->room_id = $request->room_id;
        $contract->client_id = $request->client_id;
        $contract->address = $request->input('address');
        $contract->citizen_id = $request->input('id_card');     
        $contract->startdate = $request->input('startdate');
        $contract->enddate = $this->addDateYear($request->input('startdate'), 1);
        $contract->save();
        return redirect()->route('dashboard')->with('success', "You have completed your contract");
    }
    
    private function addDateYear($date, $amount)
    {
        // $year = (int)substr($date, 0, 4)+$amount;
        // return "{$year}".substr($date, 4);
        $startdate = Carbon::parse($date);
        $enddate = $startdate->addYears($amount);
        return $enddate;
    }
}
