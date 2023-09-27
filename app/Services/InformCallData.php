<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InformCallData {
    public function readInformTable($table, $staff_role) {
        $datas = DB::table($table)
                ->join('clients', $table.'.tenant_id', 'clients.id')
                ->join('staffs', 'staffs.staff_id', '=', $table.'.'.$staff_role)
                ->select($table.'.*', 'clients.room_id', DB::raw("CONCAT(staffs.firstname, ' ', staffs.lastname) AS `fullname`"))
                ->where('tenant_id', Auth::user()->id)->get();
        return $datas;
    }
}