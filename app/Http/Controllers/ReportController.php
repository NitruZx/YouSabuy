<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Services\InformCallData;

class ReportController extends Controller
{
    public function index() {
        // $reports = DB::table('reports')->where('user_id', Auth::user()->id)->get();
        // $inform = new InformCallData();
        // $reports = $inform->readInformTable('reports', 'admin_id');
        // dd($reports);
        return view('Client/Inform/report', compact('reports'));
    }
}
