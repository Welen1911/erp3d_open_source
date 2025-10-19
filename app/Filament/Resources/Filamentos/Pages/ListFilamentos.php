<?php

namespace App\Filament\Resources\Filamentos\Pages;

use App\Filament\Resources\Filamentos\FilamentoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFilamentos extends ListRecords
{
    protected static string $resource = FilamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
