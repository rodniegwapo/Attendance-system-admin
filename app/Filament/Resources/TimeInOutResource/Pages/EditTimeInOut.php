<?php

namespace App\Filament\Resources\TimeInOutResource\Pages;

use App\Filament\Resources\TimeInOutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimeInOut extends EditRecord
{
    protected static string $resource = TimeInOutResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
