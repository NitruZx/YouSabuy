<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
{
    public function index() {
        $reports = DB::table('repair_requests')->where('name', Auth::user()->name)->get();
        return view('Client/Inform/repair-request', compact('reports'));
    }
}
