<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'picture',
        'parent_category_id',
    ];

    /**
     * Subcategories of this category
     *
     * Each category can have many sub-categories
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcats() {
        return $this->hasMany(Category::class, 'parent_category_id', 'id');
    }

    /**
     * Parent category of this category
     *
     * Each category can belong to one parent category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentcat() {
        return $this->belongsTo(Category::class, 'parent_category_id', 'id');
    }

    /**
     * Products in this category
     *
     * Each category can have many products.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany(Product::class);
    }
}
