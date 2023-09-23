<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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
        $reservation = new Reservation;
                $reservation->checkin_date = $request->input('datecheckin');
                $reservation->checkout_date = $this->addDateYear($request->input('datecheckin'), 1);
                $reservation->user_id = Auth::user()->id;
                $reservation->room_id = $request->room;
                $reservation->save();
                return redirect()->route('roomdetail');
        // $room = Room::where('room_id', '=', $request->input('room'));
        // if ($room->exists()) {
        //     if ($this->updateRoomStatus($request->input('room')) && ($room->status == 'available')) {
        //         $reservation = new Reservation;
        //         $reservation->checkin_date = $request->input('datecheckin');
        //         $checkout = (int)substr($request->input('datecheckin'), 0, 4)+1;
        //         $reservation->checkout_date = "{$checkout}".substr($request->input('datecheckin'), 4);
        //         $reservation->user_id = Auth::user()->id;
        //         $reservation->room_id = "C888";
        //         $reservation->save();
        //         return redirect()->route('roomdetail');
        //     }
        // }
        // return redirect()->route('reservepage');
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
