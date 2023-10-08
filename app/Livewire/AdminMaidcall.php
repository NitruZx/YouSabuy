<?php

namespace App\Livewire;

use App\Models\MaidCall;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;

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
                TextColumn::make('maid_id')->searchable(),
                TextColumn::make('clean_date')->searchable(),
                TextColumn::make('status')->searchable(),
                TextColumn::make('created_at')->searchable()
                ])
                ->actions([
                    Action::make('finish')
                    ->button(),
                    DeleteAction::make(),
                ]);
    }

    public function render()
    {
        return view('livewire.admin-maidcall');
    }
}
