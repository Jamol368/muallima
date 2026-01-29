<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultResource\Pages;
use App\Filament\Resources\ResultResource\RelationManagers;
use App\Models\Result;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ResultResource extends Resource
{
    protected static ?string $model = Result::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.users');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.results');
    }

    public static function getModelLabel(): string
    {
        return ResultResource::getNavigationLabel();
    }
    public static function canCreate(): bool
    {
        return false;
    }

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
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('filament.name'))
                    ->url(fn ($record) => UserResource::getUrl('edit', [
                        'record' => $record->user_id,
                    ]))
                    ->searchable(),
                Tables\Columns\TextColumn::make('testType.name')
                    ->label(__('filament.test_type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label(__('filament.subject'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('topic.name')
                    ->label(__('filament.topic'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('degree')
                    ->label(__('filament.degree'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('part')
                    ->label(__('filament.part'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('true_answers')
                    ->label(__('filament.true_answers')),
                Tables\Columns\TextColumn::make('wrong_answers')
                    ->label(__('filament.wrong_answers')),
                Tables\Columns\TextColumn::make('score')
                    ->label(__('filament.score')),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('filament.status')),
                Tables\Columns\TextColumn::make('finished_at')
                    ->label(__('filament.created_at')),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
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
            'index' => Pages\ListResults::route('/'),
        ];
    }
}
