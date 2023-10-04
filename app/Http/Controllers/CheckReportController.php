<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckReportController extends Controller
{
    public function index() {
        return view('admin/all_report/admin_report');
    }
}
