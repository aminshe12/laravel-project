<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer order_id
 * @property integer amount
 * @property string payment_method
 * @method static findOrFail($id)
 * @method static findOrΩFail($id)
 * @method static whereId($id)
 */
class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'transaction_id',
        'payment_status',
        'payment_date',
    ];

    public static function create(array $validatedData)
    {
    }

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id',);
    }
}
