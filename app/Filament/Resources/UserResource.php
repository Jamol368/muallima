<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Subject;
use App\Models\TeacherCategory;
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
        return self::getNavigationLabel();
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
                Forms\Components\TextInput::make('phone')
                    ->label(__('messages.phone'))
                    ->tel()
                    ->telRegex('/^[0-9]{9}$/')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('subject')
                    ->relationship('subject', 'name')
                    ->label(__('filament.subject'))
                    ->required(),
                Forms\Components\Select::make('teacherCategory')
                    ->relationship('teacherCategory', 'name')
                    ->label(__('filament.teacher_category'))
                    ->required(),
                Forms\Components\DatePicker::make('created_at')
                    ->label(__('messages.registered_at'))
                    ->disabled(),
                Forms\Components\Group::make()
                    ->relationship('userBalance')
                    ->schema([
                        Forms\Components\TextInput::make('balance')
                            ->label(__('messages.balance'))
                            ->numeric(),
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
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('messages.phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('teacherCategory.name')
                    ->label(__('filament.teacher_category'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label(__('filament.subject'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.created_at'))
                    ->dateTime('d/m/y H:i')
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('teacher_category_id')
                    ->label(__('filament.teacher_category'))
                    ->options(
                        TeacherCategory::query()->pluck('name', 'id')->toArray()
                    ),
                Tables\Filters\SelectFilter::make('subject_id')
                    ->label(__('filament.subject'))
                    ->options(
                        Subject::query()->pluck('name', 'id')->toArray()
                    ),
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
