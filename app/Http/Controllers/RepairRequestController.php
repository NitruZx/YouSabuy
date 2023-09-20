<?php

namespace App\Http\Controllers;

use App\Models\Repair_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
{
    public function index() {
        $reports = DB::table('repair_requests')->where('name', Auth::user()->name)->get();
        return view('Client/Inform/report', compact('reports'));
    }
    function addinfo(Request $request){
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'email' => 'required',
            'room' => 'required',
            'phone' => 'required|digits:10'    
        ]);
        $repair = new Repair_Request();
        $repair->name = Auth::user()->name;
        $repair->date = $request->input('date');
        $repair->Room = $request->input('room');
        $repair->tel = $request->input('phone');
        $repair->description = $request->input('....');
        $repair->receiver = $request->input('....');
        $repair->status = $request->input('....');
        $repair->save();
        return redirect()->route('dashboard');
    }
}
