<?php

namespace App\Filament\Resources\ProduccionResource\Pages;

use App\Filament\Resources\ProduccionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduccion extends CreateRecord
{
    protected static string $resource = ProduccionResource::class;

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
