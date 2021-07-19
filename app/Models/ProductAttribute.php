<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
   // use HasFactory;
   use SoftDeletes;
    protected $fillable = [
        'product_id',
        'att_name1',
        'att_value1',
        'att_name2',
        'att_value2',
        'user_id'
    ];
}
