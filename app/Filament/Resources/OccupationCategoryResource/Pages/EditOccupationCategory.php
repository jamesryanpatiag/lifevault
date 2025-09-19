<?php

namespace App\Filament\Resources\OccupationCategoryResource\Pages;

use App\Filament\Resources\OccupationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOccupationCategory extends EditRecord
{
    protected static string $resource = OccupationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
