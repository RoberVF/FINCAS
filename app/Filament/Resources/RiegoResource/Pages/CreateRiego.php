<?php

namespace App\Filament\Resources\RiegoResource\Pages;

use App\Filament\Resources\RiegoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRiego extends CreateRecord
{
    protected static string $resource = RiegoResource::class;

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
