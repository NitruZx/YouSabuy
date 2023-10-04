<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class contractadmin extends Controller
{
    function contract(){
        $cadmin = DB::table('registration')->get();
        return view('contractadmin', compact('cadmin'));
        
    }
    
}
