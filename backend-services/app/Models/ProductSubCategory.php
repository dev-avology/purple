<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    public function designs()
    {
        return $this->hasMany(ArtistArt::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category', 'id');
    }
}
