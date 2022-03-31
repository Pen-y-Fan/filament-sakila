<?php

declare(strict_types=1);

namespace App\Filament\Resources\FilmResource\Pages;

use App\Filament\Resources\FilmResource;
use App\Models\Film;
use Filament\Resources\Pages\Page;

class ViewFilm extends Page
{
    public ?Film $film;

    protected static string $resource = FilmResource::class;

    protected static string $view = 'filament.resources.film-resource.pages.view-film';

    public function mount(int $record): void
    {
        $this->film = Film::with('Actors', 'Categories')->findOrFail($record);
    }
}
