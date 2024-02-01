<?php

namespace App\Filament\Resources\UserStudentResource\Pages;

use App\Filament\Resources\UserStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserStudents extends ListRecords
{
    protected static string $resource = UserStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
