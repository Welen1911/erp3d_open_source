<?php

namespace App\Filament\Resources\Filamentos;

use App\Filament\Resources\Filamentos\Pages\CreateFilamento;
use App\Filament\Resources\Filamentos\Pages\EditFilamento;
use App\Filament\Resources\Filamentos\Pages\ListFilamentos;
use App\Filament\Resources\Filamentos\Schemas\FilamentoForm;
use App\Filament\Resources\Filamentos\Tables\FilamentosTable;
use App\Models\Filamento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FilamentoResource extends Resource
{
    protected static ?string $model = Filamento::class;

    protected static string|BackedEnum|null $navigationIcon = 'solar-reel-2-line-duotone';

    protected static ?string $recordTitleAttribute = 'Filamento';

    public static function form(Schema $schema): Schema
    {
        return FilamentoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FilamentosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFilamentos::route('/'),
            'create' => CreateFilamento::route('/create'),
            'edit' => EditFilamento::route('/{record}/edit'),
        ];
    }
}
