<?php

namespace App\Filament\Resources\UserPupilResource\Pages;

use App\Filament\Resources\UserPupilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserPupil extends EditRecord
{
    protected static string $resource = UserPupilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
