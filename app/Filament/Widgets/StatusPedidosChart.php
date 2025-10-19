<?php

namespace App\Filament\Widgets;

use App\Enums\StatusEnum;
use App\Models\Pedido;
use Filament\Widgets\ChartWidget;

class StatusPedidosChart extends ChartWidget
{
    protected ?string $heading = 'Status Pedidos';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
       $labels = StatusEnum::casesNames();

        $data = [
            Pedido::where('status', StatusEnum::Pendente->value)->count(),
            Pedido::where('status', StatusEnum::EmProducao->value)->count(),
            Pedido::where('status', StatusEnum::Finalizado->value)->count(),
            Pedido::where('status', StatusEnum::Cancelado->value)->count(),
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Quantidade de Pedidos',
                    'data' => $data,
                    'backgroundColor' => [
                        '#FACC15', 
                        '#3B82F6',
                        '#22C55E',
                        '#EF4444', 
                    ],
                ],
            ],
            'labels' => array_keys($labels),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
