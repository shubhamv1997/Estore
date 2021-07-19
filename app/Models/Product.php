<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_name',
        'amount',
        'description',
        'category_id',
        'subcategory_id',
        'retailer_id',
        'country_id',
        'city_id',
        'tax',
        'return_policy',
        'specification',
        'status',
        'user_id'
    ];
}
