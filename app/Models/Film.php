<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Film
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $release_year
 * @property int $language_id
 * @property int|null $original_language_id
 * @property int $rental_duration
 * @property string $rental_rate
 * @property int|null $length
 * @property string $replacement_cost
 * @property string|null $rating
 * @property mixed|null $special_features
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Actor[] $actors
 * @property-read int|null $actors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inventory[] $inventories
 * @property-read int|null $inventories_count
 * @property-read \App\Models\Language $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rental[] $rentals
 * @property-read int|null $rentals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Store[] $stores
 * @property-read int|null $stores_count
 * @method static \Illuminate\Database\Eloquent\Builder|Film newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film query()
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereOriginalLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereReleaseYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereRentalDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereRentalRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereReplacementCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereSpecialFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Film extends Model
{
    use HasFactory;

    /**
     * Protected fields when mass assigning
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'release_year' => 'integer',
    ];

    /**
     * Get the language associated with the Film.
     * @return BelongsTo<Language, Film>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get the categories associated with the Film.
     * @return BelongsToMany<Category>
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the Actors associated with the Film.
     * @return BelongsToMany<Actor>
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    /**
     * Get the Inventories for the Film.
     * @return HasMany<Inventory>
     */
    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Get the Stores associated with the Film.
     * @return HasManyThrough<Store>
     */
    public function stores(): HasManyThrough
    {
        return $this->hasManyThrough(Store::class, Inventory::class, 'film_id', 'id', 'id', 'store_id');
    }

    /**
     * Get the Rentals associated with the Film.
     * @return HasManyThrough<Rental>
     */
    public function rentals(): HasManyThrough
    {
        return $this->hasManyThrough(Rental::class, Inventory::class, 'film_id', 'inventory_id', 'id', 'id');
    }
}
