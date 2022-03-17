<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_avatar',
        'cover_image',
        'first_name',
        'last_name',
        'display_name',
        'bio',
    ];
}
