<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Mass assignable properties/fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'pricing_unit',
        'category_id',
        'picture',
        'available'
    ];

    /**
     * Category this product belongs to.
     *
     * Each product can only be in one category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
