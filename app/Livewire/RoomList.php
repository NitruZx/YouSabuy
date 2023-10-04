<?php

namespace App\Livewire;

use App\Models\Room;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RoomList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Room::query())
            ->columns([
                TextColumn::make('room_id'),
                TextColumn::make('floor'),
                TextColumn::make('building'),
                IconColumn::make('status')
    ->icon(fn (string $state): string => match ($state) {
        'unavailable' => 'heroicon-s-x-circle',
        'available' => 'heroicon-s-check-circle',
    })->color(fn (string $state): string => match ($state) {
        'unavailable' => 'warning',
        'available' => 'success',
        default => 'gray',
    }),
                TextColumn::make('roomType.monthly_price')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.room-list');
    }
}
