<?php

namespace App\Filament\Resources\OccupationCategoryResource\Pages;

use App\Filament\Resources\OccupationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOccupationCategories extends ListRecords
{
    protected static string $resource = OccupationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
