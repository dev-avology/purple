<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProduct extends Model
{
    use HasFactory;

    protected $table = 'final_products';

    protected $fillable = [
        'image',
        'overlay',
        'updated',
        'product_width',
        'product_height',
        'devicePixelRatio',
        'screenshot',
        'print_file',
        'dump_data',
    ];

}
