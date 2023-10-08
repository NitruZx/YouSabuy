<?php

namespace App\Livewire;

use App\Models\Payment;
use Flowframe\Trend\Trend;
use Filament\Support\RawJs;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class PaymentChart extends ChartWidget
{
    protected static ?string $heading = 'Payments Sum Per Month';
    protected static ?string $pollingInterval = null;
    protected static ?string $maxHeight = '300px';
    protected static string $color = 'info';

    protected function getData(): array
    {
        $trend = Trend::query(Payment::where('status', 'paid'))
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->sum('total');
        return [
            'datasets' => [
                [
                    'label' => 'Tenant Payments',
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
                        callback: (value) => value + ' THB',
                        precision: 0,
                    },
                },
            },
        }
    JS);
}
}
