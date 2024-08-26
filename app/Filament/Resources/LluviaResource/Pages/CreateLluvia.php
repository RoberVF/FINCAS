<?php

namespace App\Filament\Resources\LluviaResource\Pages;

use App\Filament\Resources\LluviaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLluvia extends CreateRecord
{
    protected static string $resource = LluviaResource::class;

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
