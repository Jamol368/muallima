<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComplaintResource\Pages;
use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.test');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.complaints');
    }

    public static function getModelLabel(): string
    {
        return self::getNavigationLabel();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')
                    ->label(__('filament.description'))
                    ->disabled()
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\Section::make('status')
                    ->heading(__('filament.status'))
                    ->schema([
                        Forms\Components\Toggle::make('status')
                            ->label(__('filament.reviewed'))
                            ->helperText(__('filament.complaint_reviewed_description')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('filament.user'))
                    ->url(fn ($record) => UserResource::getUrl('edit', [
                        'record' => $record->user_id,
                    ]))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('test.id')
                    ->label(__('filament.test'))
                    ->url(fn ($record) => TestResource::getUrl('edit', [
                        'record' => $record->test_id,
                    ]))
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label(__('filament.description'))
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\IconColumn::make('status')
                    ->label(__('filament.status'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.created_at'))
                    ->dateTime('d/m/y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->searchable(),

                SelectFilter::make('test')
                    ->relationship('test', 'id')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListComplaints::route('/'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }
}
