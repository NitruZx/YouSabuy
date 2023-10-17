<?php

namespace App\Livewire;

use App\Models\Usage;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Filament\Support\RawJs;
use Flowframe\Trend\TrendValue;

class ElectricUnitChart extends ChartWidget
{
    protected static ?string $heading = 'Electric Unit Per Month';
    protected static ?string $maxHeight = '300px';
    protected static ?string $pollingInterval = null;

    protected function getData(): array
    {
        $trend = Trend::model(Usage::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->sum('monthly_electric_units');
        return [
            'datasets' => [
                [
                    'label' => 'Electric Unit',
                    'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $trend->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): RawJs
{
    return RawJs::make(<<<JS
        {
            scales: {
                y: {
                    ticks: {
                        callback: (value) => value + ' unit',
                        precision: 0,
                    },
                },
            },
        }
    JS);
}

}
