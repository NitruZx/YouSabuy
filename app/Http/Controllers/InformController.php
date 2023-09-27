<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InformCallData;

class InformController extends Controller
{
    public function index() {
        $inform = new InformCallData();
        $reports = $inform->readInformTable('reports', 'admin_id');
        $requests = $inform->readInformTable('repair_requests', 'technician_id');
        $calls = $inform->readInformTable('maid_calls', 'maid_id');
        return view('Client/Inform/inform-main', compact('reports', 'requests', 'calls'));
    }
}
