<?php

namespace App\Http\Controllers;

use App\Models\Repair_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index() {
        $reports = DB::table('repair_requests')->where('name', Auth::user()->name)->get();
        return view('Client/Inform/report', compact('reports'));
    }
}
