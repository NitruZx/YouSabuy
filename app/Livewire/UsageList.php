<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\Usage;
use App\Models\Room;
use Carbon\Carbon;
use Filament\Tables\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
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
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\Layout\Panel;
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
                ->model(Usage::class)
                ->icon('heroicon-o-document-minus')
                ->form([
                    Select::make('room_id')
                        ->label('Room')
                        ->placeholder('Room ID')
                        ->options(Room::all()->pluck('room_id', 'room_id'))
                        ->required(),
                    Fieldset::make('Usage unit')
                        ->schema([
                            TextInput::make('water_units')
                                ->label('Water Units')
                                ->required()
                                ->numeric()
                                ->minValue(0),
                            TextInput::make('electric_units')
                                ->label('Electric Units')
                                ->required()
                                ->numeric()
                                ->minValue(0)
                        ])
                        
                    ])
                    ->using(function (array $data, string $model) : Usage {
                        $date = Carbon::now()->subMonth(1)->format('m');
                        $past_usage = DB::table('usages')->where('room_id', $data['room_id'], DB::raw('MONTH(created_at) = '.$date))->first();
                        $past_water_unit = 0;
                        $past_electric_unit = 0;
                        if ($past_usage != null) {
                            $past_water_unit = $past_usage->water_units;
                            $past_electric_unit = $past_usage->electric_units;
                        }
                        return $model::create([
                            'room_id' => $data['room_id'],
                            'water_units' => $data['water_units'],
                            'electric_units' => $data['electric_units'],
                            'monthly_water_units' => $data['water_units'] - $past_water_unit,
                            'monthly_electric_units' => $data['electric_units'] - $past_electric_unit
                        ]);
                    })
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
                ->button(),
                DeleteAction::make(),
                ViewAction::make()
                ->form([
                    TextInput::make('room_id')
                        ->required()
                ]),
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
