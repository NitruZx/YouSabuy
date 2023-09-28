<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\InformCallData;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;


class InformController extends Controller
{
    public function index() {
        $inform = new InformCallData();
        $reports = $inform->readInformTable('reports', 'admin_id');
        $requests = $inform->readInformTable('repair_requests', 'technician_id');
        $calls = $inform->readInformTable('maid_calls', 'maid_id');
        return view('Client/Inform/inform-main', compact('reports', 'requests', 'calls'));
    }

    public function report(Request $request){
        $report = new Report();
        $report->description = $request->input('reporttext');
        $report->tenant_id = Auth::user()->id;
        $report->save();
        return redirect()->back();
    }
    



}
