<?php

namespace App\Filament\Resources\TeacherCategoryResource\Pages;

use App\Filament\Resources\TeacherCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeacherCategory extends EditRecord
{
    protected static string $resource = TeacherCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
