<?php

namespace App\Filament\Resources\Pedidos\Schemas;

use App\Enums\StatusEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PedidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('cliente_nome')
                    ->required(),
                Select::make('produto_id')
                    ->relationship('produto', 'nome')
                    ->required(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1),
                Select::make('status')
                    ->required()
                    ->options(StatusEnum::casesNames()),
                DatePicker::make('data_pedido')
                    ->required(),
                TextInput::make('preco_total')
                    ->required()
                    ->numeric(),
                Toggle::make('estoque_atualizado')
                    ->required(),
                Textarea::make('observacoes')
                    ->columnSpanFull(),
            ]);
    }
}
