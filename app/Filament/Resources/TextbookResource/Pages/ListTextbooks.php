<?php

namespace App\Filament\Resources\TextbookResource\Pages;

use App\Filament\Resources\TextbookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTextbooks extends ListRecords
{
    protected static string $resource = TextbookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
