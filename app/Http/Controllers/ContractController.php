<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Registration;
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
        $contract = new Contract();
        $contract->room_id = $request->room_id;
        $contract->cilent_id = $request->client_id;
        $contract->address = $request->input('address');
        $contract->citizen_id = $request->input('id_card');     
        $contract->startdate = $request->input('datecheckin');
        $contract->enddate = $this->addDateYear($request->input('datecheckin'), 1);
        $contract->save();

    }
}
