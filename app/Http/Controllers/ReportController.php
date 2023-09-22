<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index() {
        $reports = DB::table('reports')->where('user_id', Auth::user()->id)->get();
        return view('Client/Inform/report', compact('reports'));
    }
}
