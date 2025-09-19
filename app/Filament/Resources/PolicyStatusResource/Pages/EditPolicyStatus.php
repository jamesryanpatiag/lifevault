<?php

namespace App\Filament\Resources\PolicyStatusResource\Pages;

use App\Filament\Resources\PolicyStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPolicyStatus extends EditRecord
{
    protected static string $resource = PolicyStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
