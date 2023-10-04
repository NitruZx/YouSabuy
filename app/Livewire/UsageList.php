<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\Usage;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Livewire\Component;

class UsageList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->headerActions([
                CreateAction::make()
                    ->form([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        // ...
                    ]),
            ])
            ->query(Usage::query())
            ->columns([
                TextColumn::make('room_id')->searchable(),
                TextColumn::make('monthly_water_units'),
                TextColumn::make('monthly_electric_units'),
                TextColumn::make('created_at')->searchable(),
            ])
            ->actions([
                Action::make('edit')
                ->button()
            ])
            ->bulkActions([
                BulkAction::make('Create Bill')
                    ->form([
                        DatePicker::make('Due-Date')
                    ])->requiresConfirmation()
                    ->action(function (Collection $records, array $data) {
                        // dump($records, $data['Due-Date']);
                        // $date = (string)$data['Due-Date'];
                        foreach ($records as $record) {
                            // dump($record);
                            $payment = new Payment();
                            $payment->room_id = $record->room_id;
                            $payment->water_bill = $record->monthly_water_units * 20;
                            $payment->electric_bill = $record->monthly_electric_units * 8;
                            $payment->due_date = $data['Due-Date'];
                            $payment->save();
                        }
                        // $records->each(function ($record, $date) {
                            
                            
                        // });
                    })
                    ->deselectRecordsAfterCompletion()
            ]);
    }

    public function render()
    {
        return view('livewire.usage-list');
    }
}
