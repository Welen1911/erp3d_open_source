<?php

namespace App\Filament\Resources\Pedidos\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PedidoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('cliente_nome'),
                TextEntry::make('produto.id')
                    ->label('Produto'),
                TextEntry::make('quantidade')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('data_pedido')
                    ->date(),
                TextEntry::make('preco_total')
                    ->numeric(),
                IconEntry::make('estoque_atualizado')
                    ->boolean(),
                TextEntry::make('observacoes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
