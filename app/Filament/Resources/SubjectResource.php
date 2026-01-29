<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.test');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.subject');
    }

    public static function getModelLabel(): string
    {
        return SubjectResource::getNavigationLabel();
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
                Forms\Components\ColorPicker::make('color')
                    ->label(__('filament.color')),
                Forms\Components\ColorPicker::make('color_to')
                    ->label(__('filament.color')),
                Forms\Components\FileUpload::make('img')
                    ->label(__('filament.image_upload'))
                    ->image()
                    ->directory('subject')
                    ->moveFiles()
                    ->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable(),
                Tables\Columns\ColorColumn::make('color')
                    ->label(__('filament.color')),
            ])
            ->reorderable('order')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])->orderBy('order');
    }
}
