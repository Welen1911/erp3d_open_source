<?php

namespace App\Filament\Resources\Filamentos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FilamentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->searchable(),
                TextColumn::make('material')
                    ->searchable(),
                TextColumn::make('peso_total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('peso_restante')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cor')
                    ->searchable(),
                TextColumn::make('fornecedor')
                    ->searchable(),
                TextColumn::make('preco_por_g')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('preco_compra')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
