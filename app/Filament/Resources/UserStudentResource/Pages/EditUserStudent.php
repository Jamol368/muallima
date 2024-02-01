<?php

namespace App\Filament\Resources\UserStudentResource\Pages;

use App\Filament\Resources\UserStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserStudent extends EditRecord
{
    protected static string $resource = UserStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
