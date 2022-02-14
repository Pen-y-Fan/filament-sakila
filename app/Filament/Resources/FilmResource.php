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

                //

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('description')->sortable(),
                Tables\Columns\TextColumn::make('release_year')->sortable(),
                Tables\Columns\TextColumn::make('language.name')->sortable(),
                Tables\Columns\TextColumn::make('rental_duration')->sortable(),
                Tables\Columns\TextColumn::make('rental_rate')->sortable(),
                Tables\Columns\TextColumn::make('length')->sortable(),
                Tables\Columns\TextColumn::make('replacement_cost')->sortable(),
                Tables\Columns\TextColumn::make('rating')->sortable(),
                Tables\Columns\TextColumn::make('special_feature')->sortable(),

            ])     ->defaultSort('title')
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
            'edit'   => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
