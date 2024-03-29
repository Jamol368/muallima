<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserTeacherResource\Pages;
use App\Filament\Resources\UserTeacherResource\RelationManagers;
use App\Models\UserTeacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserTeacherResource extends Resource
{
    protected static ?string $model = UserTeacher::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListUserTeachers::route('/'),
            'create' => Pages\CreateUserTeacher::route('/create'),
            'edit' => Pages\EditUserTeacher::route('/{record}/edit'),
        ];
    }
}
