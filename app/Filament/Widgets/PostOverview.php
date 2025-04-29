<?php

namespace App\Filament\Widgets;

use App\Models\post;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PostOverview extends ChartWidget
{
    protected static ?string $heading = 'Total Posts Per Month';

    protected function getData(): array
    {
        $posts = Post::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $data = [];
        $labels = [];

        foreach (range(1, 12) as $month) {
            $labels[] = date('M', mktime(0, 0, 0, $month, 1)); // Jan, Feb, dll
            $data[] = $posts[$month] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Posts',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
