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
            $registration->reg_token = $this->generateRandomString(5);
            $registration->client_id = Auth::user()->id;
            $registration->room_id = $request->input('choose');
            $registration->save();
            // return redirect()->route('roomdetail');
            return redirect()->route('dashboard')->with('success', "You have completed registration");
        }
        // return redirect()->route('roomdetail');
    }

    function join(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);
        if (Registration::where('reg_token', '=', $request->token)->exists()) {
            
            $join = Registration::where('reg_token', '=', $request->token)
                                ->join('clients', 'registrations.client_id', '=', 'clients.id')
                                ->first();

            return view('registration/join', compact('join'));
        } else {
            return redirect()->back()->with('token_failed', "Token not found");
        }
    }
    public function addregis(Request $request){
        $registration = new Registration;
        $registration->startdate = $request->input('datein');
        $registration->enddate = $this->addDateYear($request->input('datein'), 1);
        $registration->reg_token = "";
        $registration->client_id = Auth::user()->id;
        $registration->room_id = $request->room_id;
        $registration->save();
        return redirect()->route('dashboard')->with('success', "You have completed JoinRoomate");
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

    public function buttt(){
        $butt = Registration::where('reg_status', '=', 'pending')->first();
        return $butt != null;
    }

    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        if (Registration::where('reg_token', '=', $randomString)->exists()) {
            $this->generateRandomString($length);
        } else {
            return $randomString;
        }
    }
}
