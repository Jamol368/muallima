<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TownResource\Pages;
use App\Models\Province;
use App\Models\Town;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TownResource extends Resource
{
    protected static ?string $model = Town::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.address');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.town');
    }

    public static function getModelLabel(): string
    {
        return TownResource::getNavigationLabel();
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('province_id')
                    ->label(__('filament.province'))
                    ->options(Province::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.name'))
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 1000)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
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
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListTowns::route('/'),
            'create' => Pages\CreateTown::route('/create'),
            'edit' => Pages\EditTown::route('/{record}/edit'),
        ];
    }
}
