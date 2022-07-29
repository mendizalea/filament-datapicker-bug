<?php

namespace App\Filament\Resources\PruebaResource\Pages;

use App\Filament\Resources\PruebaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrueba extends EditRecord
{
    protected static string $resource = PruebaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
