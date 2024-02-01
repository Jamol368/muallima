<?php

namespace App\Filament\Resources\TeacherCategoryResource\Pages;

use App\Filament\Resources\TeacherCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherCategories extends ListRecords
{
    protected static string $resource = TeacherCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
