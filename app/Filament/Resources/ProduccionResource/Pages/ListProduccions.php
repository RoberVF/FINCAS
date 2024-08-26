<?php

namespace App\Filament\Resources\ProduccionResource\Pages;

use App\Filament\Resources\ProduccionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Illuminate\Database\Eloquent\Builder;

class ListProduccions extends ListRecords
{
    protected static string $resource = ProduccionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
