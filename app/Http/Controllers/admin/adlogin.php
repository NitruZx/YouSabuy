<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class adlogin extends Controller
{
    public function checkloc(Request $request){

        $staff = Staff::where('role', '=', 'admin');
        if ($staff->exists()){
            return redirect("");

        };

    }
}
