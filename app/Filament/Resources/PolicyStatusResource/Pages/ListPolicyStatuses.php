<?php

namespace App\Filament\Resources\PolicyStatusResource\Pages;

use App\Filament\Resources\PolicyStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPolicyStatuses extends ListRecords
{
    protected static string $resource = PolicyStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
