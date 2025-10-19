<?php

namespace App\Filament\Widgets;

use App\Models\Filamento;
use Filament\Widgets\ChartWidget;

class EstoqueFilamentosChart extends ChartWidget
{
    protected ?string $heading = 'Estoque Filamentos';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $materiais = Filamento::select('material')->distinct()->pluck('material');
        $labels = [];
        $data = [];

        foreach ($materiais as $material) {
            $labels[] = $material;
            $data[] = Filamento::where('material', $material)->sum('peso_restante');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Peso em Estoque (g)',
                    'data' => $data,
                    'backgroundColor' => [
                        '#60A5FA', // azul
                        '#34D399', // verde
                        '#FBBF24', // amarelo
                        '#F87171', // vermelho
                        '#A78BFA', // roxo
                        '#F472B6', // rosa
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
