<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.post');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.post');
    }

    public static function getModelLabel(): string
    {
        return PostResource::getNavigationLabel();
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('post_category_id')
                    ->label(__('filament.post category'))
                    ->required()
                    ->options(PostCategory::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('title')
                    ->label(__('filament.title'))
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 1000)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->label(__('filament.description'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('img')
                    ->label(__('filament.image upload'))
                    ->image()
                    ->directory('post')
                    ->moveFiles()
                    ->maxSize(2048)
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->label(__('filament.content'))
                    ->fileAttachmentsDirectory('post/content')
                    ->required(),
                Forms\Components\TextInput::make('view_count')
                    ->label(__('filament.view count'))
                    ->type('number')
                    ->disabled(),
                Forms\Components\Select::make('tags')
                    ->label(__('filament.tag'))
                    ->multiple()
                    ->relationship('tags', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament.title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('view_count')
                    ->label(__('filament.view count')),
            ])
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
            ])
            ->defaultPaginationPageOption(25);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
