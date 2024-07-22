<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.users');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.user');
    }

    public static function getModelLabel(): string
    {
        return UserResource::getNavigationLabel();
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('filament.username'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('surname')
                    ->label(__('filament.surname'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                    ->label(__('filament.middle_name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('messages.phone'))
                    ->tel()
                    ->telRegex('/^[0-9]{9}$/')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Section::make(__('messages.user balance'))
                    ->description(__('messages.user balance'))
                    ->schema([
                        Forms\Components\Fieldset::make('User balance')
                            ->label(false)
                            ->relationship('userBalance')
                            ->schema([
                                Forms\Components\TextInput::make('balance')
                                    ->label(__('messages.balance'))
                                    ->type('number'),
                                Forms\Components\TextInput::make('last_transaction_id')
                                    ->label(__('filament.last transaction id'))
                                    ->disabled(),
                            ]),
                    ]),
                Forms\Components\Section::make(__('filament.personal info'))
                    ->description(__('filament.personal info'))
                    ->schema([
                        Forms\Components\Fieldset::make('User info')
                            ->label(__('filament.user info'))
                            ->relationship('userInfo')
                            ->schema([
                                Forms\Components\Select::make('province_id')
                                    ->relationship('province', 'name')
                                    ->label(__('filament.province'))
                                    ->disabled(),
                                Forms\Components\Select::make('town_id')
                                    ->relationship('town', 'name')
                                    ->label(__('filament.town'))
                                    ->disabled(),
                                Forms\Components\Select::make('user_type_id')
                                    ->relationship('userType', 'name')
                                    ->label(__('filament.user type'))
                                    ->disabled(),
                            ]),
                    ]),
                Forms\Components\Section::make(__('filament.results'))
                    ->description(__('filament.user results'))
                    ->schema([
                        Forms\Components\Repeater::make('results')
                            ->hiddenLabel(__('filament.results'))
                            ->relationship('results')
                            ->schema([
                                Forms\Components\Select::make('test_type_id')
                                    ->relationship('testType', 'name')
                                    ->label(__('filament.test type'))
                                    ->disabled(),
                                Forms\Components\Select::make('subject_id')
                                    ->relationship('subject', 'name')
                                    ->label(__('filament.subject'))
                                    ->disabled(),
                                Forms\Components\TextInput::make('true_answers')
                                    ->label(__('filament.true answers'))
                                    ->disabled(),
                                Forms\Components\TextInput::make('wrong_answers')
                                    ->label(__('filament.wrong answers'))
                                    ->disabled(),
                                Forms\Components\TextInput::make('score')
                                    ->label(__('filament.score'))
                                    ->disabled(),
                                Forms\Components\TextInput::make('created_at')
                                    ->label(__('filament.created_at'))
                                    ->disabled(),
                            ])
                            ->disableItemCreation()
                            ->disableItemDeletion()
                            ->columns(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament.username'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->label(__('filament.surname'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('messages.phone'))
                    ->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
