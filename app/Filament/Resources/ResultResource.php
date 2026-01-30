<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultResource\Pages;
use App\Filament\Resources\ResultResource\RelationManagers;
use App\Models\Result;
use App\Models\Subject;
use App\Models\TestType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('testType.name')
                    ->label(__('filament.test_type'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label(__('filament.subject'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('topic.name')
                    ->label(__('filament.topic'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('degree')
                    ->label(__('filament.degree'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('part')
                    ->label(__('filament.part'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('true_answers')
                    ->sortable()
                    ->label(__('filament.true_answers')),
                Tables\Columns\TextColumn::make('wrong_answers')
                    ->sortable()
                    ->label(__('filament.wrong_answers')),
                Tables\Columns\TextColumn::make('score')
                    ->sortable()
                    ->label(__('filament.score')),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => __("filament.{$state}"))
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'in_process' => 'info',
                        'completed'  => 'success',
                        default      => 'gray',
                    })
                    ->sortable()
                    ->label(__('filament.status')),
                Tables\Columns\TextColumn::make('finished_at')
                    ->label(__('filament.created_at'))
                    ->sortable()
                    ->dateTime('d/m/y H:i'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->label(__('filament.user'))
                    ->relationship('user', 'name')
                    ->searchable(),
                Tables\Filters\SelectFilter::make('test_type_id')
                    ->label(__('filament.test_type'))
                    ->options(
                        TestType::query()->pluck('name', 'id')->toArray()
                    ),
                Tables\Filters\SelectFilter::make('subject_id')
                    ->label(__('filament.subject'))
                    ->options(
                        Subject::query()->pluck('name', 'id')->toArray()
                    ),
                Tables\Filters\SelectFilter::make('topic_id')
                    ->label(__('filament.topic'))
                    ->relationship('topic', 'name')
                    ->searchable()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('degree')
                    ->label(__('filament.degree'))
                    ->options(
                        [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
                    ),
                Tables\Filters\SelectFilter::make('part')
                    ->label(__('filament.part'))
                    ->options(
                        [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
                    ),
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('filament.status'))
                    ->options(
                        ['completed' => 'Tugallangan', 'in_progress' => 'Jarayonda'],
                    ),
                Tables\Filters\Filter::make('finished_at')
                    ->form([
                        Forms\Components\DatePicker::make('from_date')
                            ->label(__('filament.from_date')),
                        Forms\Components\DatePicker::make('to_date')
                            ->label(__('filament.to_date')),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['from_date'],
                                fn ($q) => $q->whereDate('finished_at', '>=', $data['from_date'])
                            )
                            ->when(
                                $data['to_date'],
                                fn ($q) => $q->whereDate('finished_at', '<=', $data['to_date'])
                            );
                    }),
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
