<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InformCallData {
    public function readInformTable($table, $staff_role) {
        $datas = DB::table($table)
                ->join('registrations', $table.'.tenant_id', 'client_id')
                ->leftJoin('staffs', 'staffs.staff_id', '=', $table.'.'.$staff_role)
                ->select($table.'.*', 'registrations.room_id', DB::raw("CONCAT(staffs.firstname, ' ', staffs.lastname) AS `fullname`"))
                ->where('tenant_id', Auth::user()->id)->get();
        return $datas;
    }
}