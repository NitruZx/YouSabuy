<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmReg extends Controller
{
    public function index() {
        return view('admin/contract/confirm');
    }
}
