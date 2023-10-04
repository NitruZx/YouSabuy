<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
// use App\Services\InformCallData;

class Admin_ReportController extends Controller
{
    public function index() {
        return view('admin/all_report/admin_report');
    }
}
