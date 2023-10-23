<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class ConfirmReg extends Controller
{
    public function index(Request $request) {
        $reg = Registration::where('client_id', '=', $request->reg)->first();
        return view('admin/contract/confirm', compact('reg'));
    }
}
