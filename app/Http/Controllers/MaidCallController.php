<?php

namespace App\Http\Controllers;

use App\Models\maidcall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MaidCallController extends Controller
{
    public function index() {
        $reports = DB::table('maid_calls')->where('user_id', Auth::user()->id)->get();
        return view('Client/Inform/maidcall', compact('reports'));
    }
}
