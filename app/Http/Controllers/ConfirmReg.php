<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmReg extends Controller
{
    public function index(Request $request) {
        $reg = Registration::where('client_id', '=', $request->reg)->first();
        $contract = Contract::where('client_id', '=', $request->reg)->first();
        // dd($contract);
        return view('admin/contract/confirm', compact('reg', 'contract'));
    }

    public function confirmReg(Request $request) {
        if (Registration::where('reg_token', '=', $request->token)->exists()) {
            $affected = DB::table('registrations')
            ->where('client_id', $request->client_id)
            ->update(['reg_status' => 'accept']);
            $affected2 = DB::table('clients')
            ->where('id', $request->client_id)
            ->update(['role' => 'tenant']);
            return redirect()->route('contractad')->with('success', "Registration Confirm Complete");
        }
        else {
            return back()->with('failed', "Token not found.");
        }
    }
}
