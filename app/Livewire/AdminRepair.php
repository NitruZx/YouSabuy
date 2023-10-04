<?php

namespace App\Livewire;

use App\Models\Repair_Request;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class AdminRepair extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {

        return $table
            ->query(Repair_Request::query())
            ->columns([
                TextColumn::make('request_id')->searchable(),
                TextColumn::make('client.firstname')
                ->label('Firstname')->searchable(),
                TextColumn::make('client.lastname')
                ->label('Lastname')->searchable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('status')->searchable(),
                TextColumn::make('created_at')->searchable()
            ]);
    }

    public function render()
    {
        return view('livewire.admin-repair');
    }
}
