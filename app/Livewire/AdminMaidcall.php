<?php

namespace App\Livewire;

use App\Models\MaidCall;
use App\Models\Staff;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;

class AdminMaidcall extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function table(Table $table): Table
    {
        return $table
            ->query(MaidCall::query())
            ->columns([
                TextColumn::make('calling_id')->searchable(),
                TextColumn::make('client.firstname')
                ->label('Firstname')->searchable(),
                TextColumn::make('client.lastname')
                ->label('Lastname')->searchable(),
                TextColumn::make('clean_date')->searchable(),
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
                TextColumn::make('staff.firstname')->label('Maid Firstname')
                ->action(
                    EditAction::make()
                ),
                TextColumn::make('staff.lastname')->label('Maid Lastname')
                ->action(
                    EditAction::make()
                ),
                TextColumn::make('created_at')->searchable()
                ])
                ->actions([
                    EditAction::make()
                    ->form([
                        Select::make('maid_id')
                        ->label('Maid')
                        ->placeholder('select maid')
                        ->relationship(name: 'staff', titleAttribute: 'firstname')
                        ->getOptionLabelFromRecordUsing(fn (Staff $record) => "{$record->firstname} {$record->lastname}")
                        // ->options(Staff::where('role', 'maid')->pluck('staff_id', 'staff_id'))
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
        return view('livewire.admin-maidcall');
    }
}
