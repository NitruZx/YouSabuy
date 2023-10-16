<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $isreg = false;
        $members = null;
        $members_cnt = 0;
        if (Auth::check()) {
            $reg = Registration::where('client_id', '=', Auth::user()->id)->exists();
            if ($reg) {
                $isreg = true;
                $room_id = Registration::select('room_id')->where('client_id', '=', Auth::user()->id)->first();
                $members = Registration::where('registrations.room_id', '=', $room_id->room_id)
                                        ->join('clients', 'registrations.client_id', '=', 'clients.id')
                                        ->get();
                $members_cnt = $members->count();
            }
        }
        return view('dashboard', compact('isreg', 'members', 'members_cnt'));
    }
}
