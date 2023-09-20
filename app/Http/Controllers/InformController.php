<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformController extends Controller
{
    public function index() {
        return view('Client/Inform/inform-main');
    }
}
