<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property  string name
 * @property  string description
 * @method static get()
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @return HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
