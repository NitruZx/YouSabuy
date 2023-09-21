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
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'room' => 'required',
            'phone' => 'required|digits:10'    
        ]);
        
        if (Room::where('room_id', '=', $request->input('room'))->exists()) {
            if ($this->updateRoomStatus($request->input('room'))) {
                $reservation = new Reservation;
                $reservation->Fname = $request->input('fname');
                $reservation->Lname = $request->input('lname');
                $reservation->Email = $request->input('email');
                $reservation->Checkin_Date = $request->input('datecheckin');
                $reservation->Checkout_Date = $request->input('datecheckout');
                $reservation->User_ID = Auth::user()->id;
                $reservation->Room = $request->input('room');
                $reservation->phone_number = $request->input('phone');
                $reservation->save();
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
}
