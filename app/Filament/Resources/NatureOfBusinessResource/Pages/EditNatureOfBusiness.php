<?php

namespace App\Filament\Resources\NatureOfBusinessResource\Pages;

use App\Filament\Resources\NatureOfBusinessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNatureOfBusiness extends EditRecord
{
    protected static string $resource = NatureOfBusinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
