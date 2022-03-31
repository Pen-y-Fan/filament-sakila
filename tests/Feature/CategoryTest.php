<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testACategoryCanBeSelectedAndFiltered(): void
    {
        \Artisan::call('db:seed');
        /** @var Collection<int, Category> $categories */
        $categories = Category::all();
        \Log::info('$categories', [$categories]);

        /** @var array<string,array<string, string|bool>> $categorySelector */
        $categorySelector = $categories->map(function ($category) {
            return [
                'id'       => $category->id,
                'name'     => $category->name,
                'selected' => false,
            ];
        })->keyBy('name')->toArray();

        $expected = [
            'Action' => [
                'id'       => 1,
                'name'     => 'Action',
                'selected' => false,
            ],
            'Animation' => [
                'id'       => 2,
                'name'     => 'Animation',
                'selected' => false,
            ],
            'Children' => [
                'id'       => 3,
                'name'     => 'Children',
                'selected' => false,
            ],
            'Classics' => [
                'id'       => 4,
                'name'     => 'Classics',
                'selected' => false,
            ],
            'Comedy' => [
                'id'       => 5,
                'name'     => 'Comedy',
                'selected' => false,
            ],
            'Documentary' => [
                'id'       => 6,
                'name'     => 'Documentary',
                'selected' => false,
            ],
            'Drama' => [
                'id'       => 7,
                'name'     => 'Drama',
                'selected' => false,
            ],
            'Family' => [
                'id'       => 8,
                'name'     => 'Family',
                'selected' => false,
            ],
            'Foreign' => [
                'id'       => 9,
                'name'     => 'Foreign',
                'selected' => false,
            ],
            'Games' => [
                'id'       => 10,
                'name'     => 'Games',
                'selected' => false,
            ],
            'Horror' => [
                'id'       => 11,
                'name'     => 'Horror',
                'selected' => false,
            ],
            'Music' => [
                'id'       => 12,
                'name'     => 'Music',
                'selected' => false,
            ],
            'New' => [
                'id'       => 13,
                'name'     => 'New',
                'selected' => false,
            ],
            'Sci-Fi' => [
                'id'       => 14,
                'name'     => 'Sci-Fi',
                'selected' => false,
            ],
            'Sports' => [
                'id'       => 15,
                'name'     => 'Sports',
                'selected' => false,
            ],
            'Travel' => [
                'id'       => 16,
                'name'     => 'Travel',
                'selected' => false,
            ],
        ];
        \Log::info('$categorySelector', [$categorySelector]);

        $this->assertEquals(
            $expected,
            $categorySelector
        );

        $categorySelector['Travel']['selected'] = ! $categorySelector['Travel']['selected'];

        \Log::info('$categorySelector["Travel"]', [$categorySelector['Travel']]);
        \Log::info('$categorySelector', [$categorySelector]);

        $this->assertEquals(
            [
                'id'       => 16,
                'name'     => 'Travel',
                'selected' => true,
            ],
            $categorySelector['Travel']
        );

        $selected = collect($categorySelector)->filter(function ($categories) {
            /** @var array $categories */
            return $categories['selected'];
        })->toArray();

        \Log::info('$selected', [$selected]);

        $this->assertCount(1, $selected);
        $this->assertEquals(
            [
                'Travel' => [
                    'id'       => 16,
                    'name'     => 'Travel',
                    'selected' => true,
                ],

            ],
            $selected
        );
    }
}
