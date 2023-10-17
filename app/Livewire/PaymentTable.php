<?php

namespace App\Livewire;

use App\Models\Payment;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Actions\DeleteAction;
use Livewire\Component;

class PaymentTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Payment::query())
            ->columns([
                TextColumn::make('bill_id')->sortable(),
                TextColumn::make('room_id')->sortable(),
                TextColumn::make('late_fee'),
                TextColumn::make('total'),
                TextColumn::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'unpaid' => 'warning',
                                'paid' => 'success',
                            })
                            ->icon(fn (string $state): string => match ($state) {
                                'unpaid' => 'heroicon-o-clock',
                                'paid' => 'heroicon-o-check-circle',
                            }),
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('due_date')->sortable(),
                TextColumn::make('checkout_date')->sortable(),
                ])
            ->groups([
                Group::make('status'),
                Group::make('room_id')
                ])
            ->filters([
                // ...
            ])
            ->actions([
                DeleteAction::make()
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.payment-table');
    }
}
