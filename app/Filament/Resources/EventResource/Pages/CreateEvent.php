<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['year_level'] = implode(',', $data['year_level']);

    //     return $data;
    // }
}
