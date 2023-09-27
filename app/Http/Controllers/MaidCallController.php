<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\InformCallData;

class MaidCallController extends Controller
{
    public function index() {
        // $reports = DB::table('maid_calls')->where('user_id', Auth::user()->id)->get();
        // $inform = new InformCallData();
        // $reports = $inform->readInformTable('maid_calls', 'maid_id');
        return view('Client/Inform/maidcall', compact('reports'));
    }
}
