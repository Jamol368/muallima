<?php

namespace App\Filament\Resources;

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
                    ->label(__('filament.test type'))
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
                        $subject_id = $get('$subject_id');
                        if (!$subject_id) {
                            return Topic::query()->pluck('name', 'id');
                        }

                        return Topic::query()->where('subject_id', $subject_id)->pluck('name', 'id');
                    })
                    ->reactive()
                    ->searchable()
                    ->required(),
                Forms\Components\RichEditor::make('question')
                    ->label(__('filament.question'))
                    ->fileAttachmentsDirectory('test')
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
                            ->label(__('filament.is true'))
                            ->inline(false),
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
                    ->label(__('filament.test type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label(__('filament.subject'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('question')
                    ->label(__('filament.question'))
                    ->html()->wrap()->limit(50),
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
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }
}
