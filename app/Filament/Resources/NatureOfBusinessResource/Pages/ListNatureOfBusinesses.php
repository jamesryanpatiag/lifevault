<?php

namespace App\Filament\Resources\NatureOfBusinessResource\Pages;

use App\Filament\Resources\NatureOfBusinessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNatureOfBusinesses extends ListRecords
{
    protected static string $resource = NatureOfBusinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
