<?php

namespace App\Filament\Resources\LluviaResource\Pages;

use App\Filament\Resources\LluviaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLluvia extends EditRecord
{
    protected static string $resource = LluviaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
