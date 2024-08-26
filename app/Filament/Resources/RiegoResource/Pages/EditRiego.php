<?php

namespace App\Filament\Resources\RiegoResource\Pages;

use App\Filament\Resources\RiegoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiego extends EditRecord
{
    protected static string $resource = RiegoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
