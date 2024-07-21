<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImg()
    {
        return $this->productImages()->first()->name ?? null;
    }

    public function productImgs()
    {
        return $this->productImages()->get();
    }

    // public $image = $this->productImage()->name;
    // public static $img = $this->productImage()->name;










}
