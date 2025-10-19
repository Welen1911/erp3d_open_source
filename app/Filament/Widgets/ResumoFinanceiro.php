<?php

namespace App\Filament\Widgets;

use App\Models\Pedido;
use App\Models\Produto;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ResumoFinanceiro extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Total de vendas
        $faturamentoTotal = Pedido::sum('preco_total');

        // Total de custos
        $custoTotal = Produto::sum('preco_custo');

        // Lucro baseado na diferença entre venda e custo
        $lucro = Produto::all()->sum(function ($produto) {
            $quantidadeVendida = $produto->pedidos()->sum('quantidade') ?? 0;
            return ($produto->preco_venda - $produto->preco_custo) * $quantidadeVendida;
        });

        return [
            Stat::make('Faturamento Total', 'R$ ' . number_format($faturamentoTotal, 2, ',', '.'))
                ->description('Total recebido em pedidos')
                ->icon('heroicon-m-currency-dollar')
                ->color('success'),

            Stat::make('Custo Total', 'R$ ' . number_format($custoTotal, 2, ',', '.'))
                ->description('Custo médio dos produtos')
                ->icon('heroicon-m-banknotes')
                ->color('warning'),

            Stat::make('Lucro', 'R$ ' . number_format($lucro, 2, ',', '.'))
                ->description('Lucro estimado com base nas vendas')
                ->icon('heroicon-m-chart-bar')
                ->color($lucro >= 0 ? 'success' : 'danger'),
        ];
    }
}
