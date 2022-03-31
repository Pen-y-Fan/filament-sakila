<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\FilmResource\Pages;
use App\Filament\Resources\FilmResource\RelationManagers;
use App\Models\Film;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')->required(),
                                Forms\Components\TextInput::make('description')->required(),
                                Forms\Components\TextInput::make('release_year')->required(),
                                Forms\Components\BelongsToSelect::make('languageId')
                                    ->relationship('language', 'name'),
                                Forms\Components\TextInput::make('rental_duration')->required(),
                                Forms\Components\TextInput::make('rental_rate')->required(),
                                Forms\Components\TextInput::make('length')->required(),
                                Forms\Components\TextInput::make('replacement_cost')->required(),
                                Forms\Components\TextInput::make('rating')->required(),
                                //                                    ->reactive()
                                //                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                //                                Forms\Components\TextInput::make('slug')
                                //                                    ->disabled()
                                //                                    ->required()
                                //                                    ->unique(Brand::class, 'slug', fn ($record) => $record),
                            ]),
                        //                        Forms\Components\TextInput::make('website')
                        //                            ->required()
                        //                            ->url(),
                        //                        Forms\Components\Toggle::make('is_visible')
                        //                            ->label('Visible to customers.')
                        //                            ->default(true),
                        //                        Forms\Components\MarkdownEditor::make('description')
                        //                            ->label('Description'),
                    ]),
                //                    ->columnSpan([
                //                        'sm' => 2,
                //                    ]),
                //                Forms\Components\Card::make()
                //                    ->schema([
                //                        Forms\Components\Placeholder::make('created_at')
                //                            ->label('Created at')
                //                            ->content(fn (?Brand $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                //                        Forms\Components\Placeholder::make('updated_at')
                //                            ->label('Last modified at')
                //                            ->content(fn (?Brand $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                //                    ])
                //                    ->columnSpan(1),
            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(25)->sortable(),
                Tables\Columns\TextColumn::make('release_year')->sortable(),
                Tables\Columns\TextColumn::make('language.name')->sortable(),
                Tables\Columns\TextColumn::make('rental_duration')->label('Duration')->sortable(),
                Tables\Columns\TextColumn::make('rental_rate')->money(shouldConvert: true)->sortable(),
                Tables\Columns\TextColumn::make('length')->sortable(),
                Tables\Columns\TextColumn::make('replacement_cost')->money(shouldConvert: true)->sortable(),
                Tables\Columns\TextColumn::make('rating')->sortable(),
                Tables\Columns\TextColumn::make('special_features')->limit(25)->sortable(),

            ])->defaultSort('title')
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
            'index'  => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'view'   => Pages\ViewFilm::route('/{record}'),
            'edit'   => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
