<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $isreg = false;
        if (Auth::check()) {
            $reg = Registration::where('client_id', '=', Auth::user()->id)->exists();
            if ($reg) {
                $isreg = true;
            }
        }
        return view('dashboard', compact('isreg'));
    }
}
