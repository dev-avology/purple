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
}
