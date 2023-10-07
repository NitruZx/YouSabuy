<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;
use function PHPUnit\Framework\returnSelf;
// use app\Models\Reservation;

class ReserveController extends Controller
{
    function index(Request $request)
    {
        $rooms = DB::table('rooms')->where('status', 'available')->get();
        return view('registration/registration', compact('rooms'));
        $registrations = new Registration;
        $registrations->startdate = $request->input('datecheckin');
        $registrations->enddate = $this->addDateYear($request->input('datecheckin'), 1);
        $registrations->client_id = Auth::user()->id;
        $registrations->room_id = $request->choose;
        $registrations->save();
        return redirect()->route('roomdetail');
    }

    function addinfo(Request $request)
    {
        $request->validate([
            'choose' => 'required',
        ]);

        $room = Room::where('room_id', '=', $request->input('choose'))->first();


        if ($this->checkReg()) {

            return back()->with('message', 'You have already registration');
        } else if ($this->updateRoomStatus($request->input('choose')) && ($room->status == 'available')) {
            $registration = new Registration;
            $registration->startdate = $request->input('datecheckin');
            $registration->enddate = $this->addDateYear($request->input('datecheckin'), 1);
            $registration->client_id = Auth::user()->id;
            $registration->room_id = $request->input('choose');
            $registration->save();
            return redirect()->route('roomdetail');
        } else {
            return back()->with('success', "You have completed registration");
        }
        return redirect()->route('roomdetail');
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

    private function updateRoomStatus($roomid)
    {
        $affected = DB::table('rooms')
            ->where('room_id', $roomid)
            ->update(['status' => 'unavailable']);
        return $affected;
    }

    private function addDateYear($date, $amount)
    {
        // $year = (int)substr($date, 0, 4)+$amount;
        // return "{$year}".substr($date, 4);
        $startdate = Carbon::parse($date);
        $enddate = $startdate->addYears($amount);
        return $enddate;
    }

    private function checkReg()
    {
        $affected = DB::table('registrations')->where('client_id', Auth::user()->id)->first();
        return $affected != null;
    }
}
