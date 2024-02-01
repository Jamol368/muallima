<?php

namespace App\Filament\Resources\UserTeacherResource\Pages;

use App\Filament\Resources\UserTeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserTeacher extends EditRecord
{
    protected static string $resource = UserTeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
