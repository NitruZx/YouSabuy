<?php

namespace App\Livewire;

use App\Models\Registration;
use Livewire\Component;
use Livewire\WithPagination;

class RegTable extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';

    public function render()
    {
        return view('livewire.reg-table' , [
            'regs' => Registration::search($this->search)->paginate($this->perPage),
        ]);
    }
}
