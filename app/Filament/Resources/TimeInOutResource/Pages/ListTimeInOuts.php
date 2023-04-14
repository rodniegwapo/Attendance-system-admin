<?php

namespace App\Filament\Resources\TimeInOutResource\Pages;

use App\Filament\Resources\TimeInOutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeInOuts extends ListRecords
{
    protected static string $resource = TimeInOutResource::class;

    protected static ?string $navigationLabel = 'Attendances';

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
