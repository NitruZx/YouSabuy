<?php

namespace App\Livewire;

use App\Models\Repair_Request;
use App\Models\Staff;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;

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
                TextColumn::make('status')->searchable()
                            ->action(
                                EditAction::make()
                            )
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'unfinished' => 'warning',
                                'finished' => 'success',
                            })
                            ->icon(fn (string $state): string => match ($state) {
                                'unfinished' => 'heroicon-o-clock',
                                'finished' => 'heroicon-o-check-circle',
                            }),
                TextColumn::make('staff.firstname')->label('Staff Firstname')->action(
                    EditAction::make()
                ),
                TextColumn::make('staff.lastname')->label('Staff Lastname')->action(
                    EditAction::make()
                ),
                TextColumn::make('created_at')->searchable()
                ])
                ->actions([
                    EditAction::make()
                ->form([
                    Select::make('technician_id')
                        ->label('Technician')
                        ->placeholder('select technician')
                        ->relationship(name: 'staff', titleAttribute: 'firstname')
                        ->getOptionLabelFromRecordUsing(fn (Staff $record) => "{$record->firstname} {$record->lastname}")
                        // ->options(Staff::where('role', 'technician')->pluck('staff_id', 'staff_id'))
                        ->required(),
                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'finished' => 'finished',
                            'unfinished' => 'unfinished',
                        ])
                ]),
                    DeleteAction::make(),
                ]);
    }

    public function render()
    {
        return view('livewire.admin-repair');
    }
}
