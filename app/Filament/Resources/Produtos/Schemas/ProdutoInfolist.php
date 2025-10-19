<?php

namespace App\Filament\Resources\Produtos\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProdutoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nome'),
                TextEntry::make('descricao')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('preco_venda')
                    ->numeric(),
                TextEntry::make('preco_custo')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('filamento.nome')
                    ->label('Filamento'),
                TextEntry::make('peso_uso')
                    ->numeric(),
                TextEntry::make('tempo_estimado')
                    ->numeric()
                    ->placeholder('-'),
                ImageEntry::make('imagem')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
