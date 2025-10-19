<?php

namespace App\Filament\Resources\Filamentos\Pages;

use App\Filament\Resources\Filamentos\FilamentoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFilamento extends EditRecord
{
    protected static string $resource = FilamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
