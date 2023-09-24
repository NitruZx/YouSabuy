<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnSelf;
// use app\Models\Reservation;

class ReserveController extends Controller
{
    function index(){
        return view('reserve.reserve-room');
    }

    function addinfo(Request $request){
        $request->validate([
            'room' => 'required',    
        ]);
        $room = Room::where('room_id', '=', $request->input('room'))->first();
        if ($room->exists()) {
            if ($this->updateRoomStatus($request->input('room')) && ($room->status == 'available')) {
                $registration = new Registration;
                $registration->startdate = $request->input('datecheckin');
                $registration->enddate = $this->addDateYear($request->input('datecheckin'), 1);
                $registration->client_id = Auth::user()->id;
                $registration->room_id = $request->room;
                $registration->save();
                return redirect()->route('roomdetail');
            }
        }
        return redirect()->route('reservepage');
    }
    public function upload(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            // Store the file with a unique name in the specified directory
            $filePath = $file->store('uploads');
            // You can also specify a custom disk or directory if needed:
            $filePath = $file->storeAs('custom_directory', 'custom_filename.jpg', 's3');
            return "File uploaded successfully. Path: $filePath";
        } else {
            return "No file uploaded.";
        }
    }
    
    private function updateRoomStatus($roomid) {
        $affected = DB::table('rooms')
              ->where('room_id', $roomid)
              ->update(['status' => 'unavailable']);
        return $affected;
    }

    private function addDateYear($date, $amount) {
        $year = (int)substr($date, 0, 4)+$amount;
        return "{$year}".substr($date, 4);
    }
    
    
}
