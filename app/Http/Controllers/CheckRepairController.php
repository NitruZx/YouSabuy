<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckRepairController extends Controller
{
    public function index() {
        return view('admin/all_report/admin_repair');
    }
}
