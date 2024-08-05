<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * @property integer user_id
 * @property integer order_date
 * @property string  status
 * @property integer total_amount
 */

class Order extends Model
{
    use HasFactory;

    protected $fillable  = [
        'user_id',
        'order_date',
        'status',
        'total_amount',
    ];

    public static function create(array $all)
    {
    }

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasOne
     */
    public function payments(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * @return HasMany
     */
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
