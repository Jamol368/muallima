<?php

namespace App\Filament\Resources;

use App\Enums\TestTypeEnum;
use App\Filament\Resources\TestResource\Pages;
use App\Models\Subject;
use App\Models\Test;
use App\Models\TestType;
use App\Models\Topic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class TestResource extends Resource
{
    protected static ?string $model = Test::class;

    protected static ?string $navigationIcon = 'heroicon-o-window';

    public static function getNavigationGroup(): ?string
    {
        return __('filament.test');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament.test');
    }

    public static function getModelLabel(): string
    {
        return TestResource::getNavigationLabel();
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('test_type_id')
                    ->label(__('filament.test_type'))
                    ->options(
                        TestType::query()
                            ->orderBy('name')
                            ->get()
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->label(__('filament.subject'))
                    ->options(
                        Subject::query()
                            ->orderBy('name')
                            ->get()
                            ->pluck('name', 'id')
                    )
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('topic_id', null))
                    ->searchable()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('topic_id')
                    ->label(__('filament.topic'))
                    ->options(function ($get) {
                        $subject_id = $get('subject_id');
                        return Topic::query()->where('subject_id', $subject_id)->pluck('name', 'id');
                    })
                    ->reactive()
                    ->searchable()
                    ->visible(fn (callable $get) => $get('test_type_id') == TestTypeEnum::TEST_TYPE_TOPIC->value),
                Forms\Components\Select::make('degree')
                    ->label(__('filament.degree'))
                    ->options([
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                    ]),
                Forms\Components\Select::make('part')
                    ->label(__('filament.part'))
                    ->options([
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                    ]),
                TiptapEditor::make('question')
                    ->label(__('filament.question'))
                    ->directory('test')
                    ->required(),
                Forms\Components\Repeater::make('answers')
                    ->label(__('filament.answers'))
                    ->relationship()
                    ->schema([
                        Forms\Components\RichEditor::make('option')
                            ->label(__('filament.option'))
                            ->fileAttachmentsDirectory('answer')
                            ->required()
                            ->columnSpan(3),
                        Forms\Components\Checkbox::make('is_true')
                            ->label(__('filament.is_true'))
                            ->inline(false),
                    ])
                    ->default([
                        ['option' => '', 'is_true' => false],
                        ['option' => '', 'is_true' => false],
                        ['option' => '', 'is_true' => false],
                        ['option' => '', 'is_true' => false],
                    ])
                    ->cloneable()
                    ->deleteAction(
                        fn(Forms\Components\Actions\Action $action) => $action->requiresConfirmation(),
                    )->columns(4),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('testType.name')
                    ->label(__('filament.test_type'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label(__('filament.subject'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('topic.name')
                    ->label(__('filament.topic'))
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('degree')
                    ->label(__('filament.degree'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('part')
                    ->label(__('filament.part'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.created_at'))
                    ->dateTime('d/m/y H:i')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
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
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }
}
