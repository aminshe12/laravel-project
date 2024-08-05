<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int     category_id
 * @property string  name
 * @property string  description
 * @property integer price
 * @property string  image
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return HasMany
     */
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
