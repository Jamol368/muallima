<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherCategoryResource\Pages;
use App\Filament\Resources\TeacherCategoryResource\RelationManagers;
use App\Models\TeacherCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TeacherCategoryResource extends Resource
{
    protected static ?string $model = TeacherCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return __('filament.users');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.teacher category');
    }

    public static function getModelLabel(): string
    {
        return TeacherCategoryResource::getNavigationLabel();
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.name'))
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 1000)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->label(__('filament.content'))
                    ->fileAttachmentsDirectory('teachercategory'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListTeacherCategories::route('/'),
            'create' => Pages\CreateTeacherCategory::route('/create'),
            'edit' => Pages\EditTeacherCategory::route('/{record}/edit'),
        ];
    }
}
