<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagePayments extends Controller
{
    public function index() {
        $datas = DB::table('payments')->get();        

        return view('admin/payments/manage-payments', compact('datas'));
    }
}
