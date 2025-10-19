<?php

namespace App\Filament\Widgets;

use App\Enums\StatusEnum;
use App\Models\Pedido;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PedidosPendentes extends StatsOverviewWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $pendentes = Pedido::where('status', StatusEnum::Pendente->value)->count();
        $emProducao = Pedido::where('status', StatusEnum::EmProducao->value)->count();
        $finalizados = Pedido::where('status', StatusEnum::Finalizado->value)->count();

        $total = Pedido::count();

        return [
            Stat::make('Pedidos Pendentes', $pendentes)
                ->description('Pedidos pendentes')
                ->descriptionIcon(Heroicon::OutlinedClock)
                ->color('danger'),

            Stat::make('Em Produção', $emProducao)
                ->description('Pedidos em produção')
                ->descriptionIcon(Heroicon::OutlinedCog)
                ->color('warning'),

            Stat::make('Finalizados', $finalizados)
                ->description('Pedidos finalizados')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('success'),

            Stat::make('Total de Pedidos', $total)
                ->description('Total de pedidos')
                ->descriptionIcon(Heroicon::OutlinedArrowRightCircle)
                ->color('gray'),
        ];
    }
}
