<?php

namespace App\Filament\Resources\Filamentos\Schemas;

use App\Enums\MaterialEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FilamentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                Select::make('material')
                    ->required()
                    ->options(MaterialEnum::casesNames())
                    ->searchable(),
                TextInput::make('peso_total')
                    ->required()
                    ->numeric(),
                TextInput::make('peso_restante')
                    ->required()
                    ->numeric(),
                TextInput::make('cor')
                    ->required(),
                TextInput::make('fornecedor'),
                TextInput::make('preco_por_g')
                    ->numeric(),
                TextInput::make('preco_compra')
                    ->required()
                    ->numeric(),
                Textarea::make('observacoes')
                    ->columnSpanFull(),
            ]);
    }
}
