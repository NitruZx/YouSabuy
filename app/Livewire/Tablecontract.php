<?php

namespace App\Livewire;


use App\Models\Reservation;
use App\Models\Registration;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Livewire\Component;


class Tablecontract extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->query(Registration::query())
            ->columns([
                TextColumn::make('room_id'),
                TextColumn::make('client.firstname')->label('Firstname')->searchable(),
                TextColumn::make('client.lastname')->label('Lastname')->searchable(),
                TextColumn::make('created_at')->searchable(),
            ])
            ->actions([
                Action::make('Accept')
                ->button(),
                DeleteAction::make(),
                ViewAction::make()
                ->form([
                    TextInput::make('room_id')
                        ->required()
                ]),
            ]);
    }

    public function render()
    {
        return view('livewire.tablecontract');
    }
}
