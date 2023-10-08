<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions\DeleteAction;

class AdminReport extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {

        return $table
            ->query(Report::query())
            ->columns([
                TextColumn::make('report_id')->searchable(),
                TextColumn::make('client.firstname')
                ->label('Firstname')->searchable(),
                TextColumn::make('client.lastname')
                ->label('Lastname')->searchable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('created_at')->searchable(),
                TextColumn::make('')->searchable()
               
                ])
                ->actions([
                    DeleteAction::make(),
                ]);
    }

    public function render()
    {
        return view('livewire.admin-report');
    }
}
