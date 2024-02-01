<?php

namespace App\Filament\Resources\UserPupilResource\Pages;

use App\Filament\Resources\UserPupilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserPupils extends ListRecords
{
    protected static string $resource = UserPupilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
