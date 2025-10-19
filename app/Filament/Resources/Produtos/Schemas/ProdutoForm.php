<?php

namespace App\Filament\Resources\Produtos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProdutoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                Textarea::make('descricao')
                    ->columnSpanFull(),
                TextInput::make('preco_venda')
                    ->required()
                    ->numeric(),
                TextInput::make('preco_custo')
                    ->numeric(),
                Select::make('filamento_id')
                    ->relationship('filamento', 'nome')
                    ->required(),
                TextInput::make('peso_uso')
                    ->required()
                    ->numeric(),
                TextInput::make('tempo_estimado')
                    ->numeric(),
                FileUpload::make('imagem')
                    ->image()
                    ->imageEditor(),
            ]);
    }
}
