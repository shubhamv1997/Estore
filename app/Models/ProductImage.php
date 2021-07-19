<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductImage extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'image_1',
        'image_2',
        'image_3',
        'user_id'
    ];
}
