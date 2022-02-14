<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * App\Models\Rental
 *
 * @property int $id
 * @property string $rental_date
 * @property int $inventory_id
 * @property int $customer_id
 * @property string|null $return_date
 * @property int $staff_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\Film|null $film
 * @property-read \App\Models\Inventory $inventory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\Staff $staff
 * @property-read \App\Models\Store|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|Rental newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rental newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rental query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereInventoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereRentalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rental whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rental extends Model
{
    use HasFactory;

    /**
     * Protected fields when mass assigning
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Get the Customer associated with this Rental.
     * @return BelongsTo<Customer, Rental>
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the Staff associated with this Rental.
     * @return BelongsTo<Staff, Rental>
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Get the Inventory associated with this Rental.
     * @return BelongsTo<Inventory, Rental>
     */
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    /**
     * Get the Payments for the Rental.
     * @return HasMany<Payment>
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the Film associated with the Rental.
     * @return HasOneThrough<Film>
     */
    public function film(): HasOneThrough
    {
        return $this->hasOneThrough(Film::class, Inventory::class, 'id', 'id', 'inventory_id', 'film_id');
    }

    /**
     * Get the Store associated with the Rental.
     * @return HasOneThrough<Store>
     */
    public function store(): HasOneThrough
    {
        return $this->hasOneThrough(Store::class, Inventory::class, 'id', 'id', 'inventory_id', 'store_id');
    }
}
