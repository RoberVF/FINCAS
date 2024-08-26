<?php

namespace App\Filament\Resources\RiegoResource\Pages;

use App\Filament\Resources\RiegoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRiegos extends ListRecords
{
    protected static string $resource = RiegoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
