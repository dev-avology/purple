<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'sku',
        'status',
        'product_image',
        'sub_category',
        'orientation'
    ];

    public function categoryData()
    {
        return $this->hasOne(ProductSubCategory::class, 'id', 'sub_category');
    }
}
