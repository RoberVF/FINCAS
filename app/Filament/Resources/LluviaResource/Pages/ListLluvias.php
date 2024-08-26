<?php

namespace App\Filament\Resources\LluviaResource\Pages;

use App\Filament\Resources\LluviaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLluvias extends ListRecords
{
    protected static string $resource = LluviaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
