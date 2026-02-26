<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TextbookResource\Pages;
use App\Filament\Resources\TextbookResource\RelationManagers;
use App\Models\Textbook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class TextbookResource extends Resource
{
    protected static ?string $model = Textbook::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return trans('messages.textbooks');
    }

    public static function getModelLabel(): string
    {
        return trans('messages.textbooks');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.name'))
                    ->required(),
                Forms\Components\FileUpload::make('file')
                    ->label(__('messages.file'))
                    ->directory('textbooks')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->moveFiles()
                    ->maxSize(20480),
                Forms\Components\Textarea::make('description')
                    ->rows(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name')),
                Tables\Columns\IconColumn::make('file')
                    ->label(__('messages.textbook'))
                    ->url(fn ($record) => Storage::url($record->file), true)
                    ->color('primary')
                    ->icon('heroicon-m-document-text'),
                Tables\Columns\TextColumn::make('downloaded')
                    ->label(__('messages.downloaded')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTextbooks::route('/'),
            'create' => Pages\CreateTextbook::route('/create'),
            'edit' => Pages\EditTextbook::route('/{record}/edit'),
        ];
    }
}
