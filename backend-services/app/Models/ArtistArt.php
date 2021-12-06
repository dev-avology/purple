<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistArt extends Model
{
    use HasFactory;

    private $lowPrice = 10;
    private $highPrice = 100; 

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
        'price',
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

    public function getTagsArrayAttribute()
    {
        return explode(',', $this->attributes['tags']);
    }

    public function scopetagFilter($query, $tag)
    {
        if ($tag) {
            return $query->whereRaw("FIND_IN_SET('" . $tag . "', tags)");
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

    public function scopeArtMediaFilter($query, $artMediaID)
    {
        if ($artMediaID) {
            return $query->where(['artwork_media_id' => $artMediaID]);
        }
        return $query;
    }

    public function scopeLowPriceFilter($query, $priceDigit)
    {
        if ($priceDigit) {
            return $query->where('price', '<', $this->lowPrice);
        }
        return $query;
    }

    public function scopeMediumPriceFilter($query, $priceDigit)
    {
        if ($priceDigit) {
            return $query->where('price', '<', $this->highPrice)
                ->orWhere('price', '=', $this->lowPrice)
                ->orWhere('price', '>', $this->lowPrice);
        }
        return $query;
    }

    public function scopeHighPriceFilter($query, $priceDigit)
    {
        if ($priceDigit) {
            return $query->orWhere('price', '=', $this->highPrice)->orWhere('price', '>', $this->highPrice);
        }
        return $query;
    }
}
