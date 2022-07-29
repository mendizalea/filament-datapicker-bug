<?php

namespace App\Filament\Resources\PruebaResource\Pages;

use App\Filament\Resources\PruebaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPruebas extends ListRecords
{
    protected static string $resource = PruebaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
