<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On; 
use Livewire\Component;

class StatusCard extends Component
{
    public $reg;

    // public $status;

    public function cancel($client_id) {
        $affected = DB::table('registrations')
              ->where('client_id', $client_id)
              ->update(['reg_status' => 'cancelled']);
        if ($affected) {
            // $this->status = 'cancelled';
            session()->flash('status', 'The registrations has been cancelled.');
            return redirect(request()->header('Referer'));
        }
    }

    public function deleteReg($client_id, $room_id) {
        $affected = DB::table('registrations')->where('client_id', $client_id)->delete();
        $affected2 = DB::table('rooms')
              ->where('room_id', $room_id)
              ->update(['status' => 'available']);
        if ($affected && $affected2) {
            session()->flash('status', 'The registrations has been cancelled.');
            return redirect(request()->header('Referer'));
        }
    }

    public function resume($client_id) {
        $affected = DB::table('registrations')
              ->where('client_id', $client_id)
              ->update(['reg_status' => 'accept']);
        if ($affected) {
            // $this->status = 'accept';
            session()->flash('status', 'The registrations has been resumed.');
            return redirect(request()->header('Referer'));
        }
    }

    public function mount() {
        $this->reg = DB::table('registrations')
                    ->join('clients', 'clients.id', '=', 'registrations.client_id')
                    ->select('registrations.*', 'clients.firstname', 'clients.lastname')
                    ->where('client_id', Auth::user()->id)->first();
        // $this->status = $this->reg->reg_status;
    }

    public function render()
    {
        return view('livewire.status-card');
    }
}
