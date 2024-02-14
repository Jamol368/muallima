<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestTypeResource\Pages;
use App\Filament\Resources\TestTypeResource\RelationManagers;
use App\Models\Province;
use App\Models\TestType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\Component;

class TestTypeResource extends Resource
{
    protected static ?string $model = TestType::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.test');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.test type');
    }

    public static function getModelLabel(): string
    {
        return TestTypeResource::getNavigationLabel();
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
                Forms\Components\TextInput::make('score')
                    ->label(__('filament.score'))
                    ->integer()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label(__('filament.price'))
                    ->integer()
                    ->required(),
                Forms\Components\TextInput::make('questions')
                    ->label(__('filament.questions'))
                    ->integer()
                    ->required(),
                Forms\Components\TextInput::make('mins')
                    ->label(__('filament.mins'))
                    ->integer()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->label(__('filament.score'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('filament.price'))
                    ->searchable(),
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
            'index' => Pages\ListTestTypes::route('/'),
            'create' => Pages\CreateTestType::route('/create'),
            'edit' => Pages\EditTestType::route('/{record}/edit'),
        ];
    }
}
