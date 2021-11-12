<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistArt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'orientation',
        'art_id',
        'slug',
        'tags',
        'description',
        'art_photo_path',
        'artwork_media_id',
        'is_mature_content',
        'is_public',
    ];

    public function artist()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function artist_profile()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'user_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'sub_category', 'category_id');
    }

    public function productByOrientation()
    {
        return $this->hasOne(Product::class, 'orientation', 'orientation');
    }

    public function designsByCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'category_id');
    }

    public function scopetagFilter($query, $tag)
    {
        if ($tag) {
            return $query->whereRaw("FIND_IN_SET('".$tag."', tags)");
        }
        return $query;
    }

    public function scopeCategoryIDFilter($query, $categoryID)
    {
        if ($categoryID) {
            return $query->where(['category_id' => $categoryID]);
        }
        return $query;
    }
}
