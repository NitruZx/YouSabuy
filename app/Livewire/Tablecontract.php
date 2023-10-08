<?php

namespace App\Livewire;


use App\Models\Reservation;
use App\Models\Registration;
use App\Http\Controllers\ReserveController;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Enums\FiltersLayout;
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
            ->filters([
                SelectFilter::make('reg_status')
                ->options([
                    'accept' => 'accept',
                    'pending' => 'pending',
                    'cancelled' => 'cancelled',
                ]),
                ])
            ->filtersFormWidth('xs')
            ->columns([
                TextColumn::make('room_id')->searchable()->sortable(),
                TextColumn::make('client.firstname')->label('Firstname')->searchable()->sortable(),
                TextColumn::make('client.lastname')->label('Lastname')->searchable()->sortable(),
                TextColumn::make('reg_status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'accept' => 'success',
                                'cancelled' => 'danger',
                            })
                            ->icon(fn (string $state): string => match ($state) {
                                'cancelled' => 'heroicon-s-x-circle',
                                'pending' => 'heroicon-o-clock',
                                'accept' => 'heroicon-o-check-circle',
                            })
                            ->action(
                                EditAction::make()
                                ->form([
                                    Select::make('reg_status')
                                        ->label('Reg Status')
                                        ->options([
                                            'accept' => 'accept',
                                            'pending' => 'pending',
                                            'cancelled' => 'cancelled',
                                        ])
                                     ])
                                    ),
                TextColumn::make('created_at')->searchable()->sortable(),
            ])
            ->groups([
                Group::make('reg_status'),
                Group::make('room_id')
            ])
            ->actions([
                EditAction::make()
                ->form([
                    Select::make('reg_status')
                        ->label('Reg Status')
                        ->options([
                            'accept' => 'accept',
                            'pending' => 'pending',
                            'cancelled' => 'cancelled',
                        ])
                ]),
                DeleteAction::make(),
            ]);
    }

    public function render()
    {
        return view('livewire.tablecontract');
    }
}
