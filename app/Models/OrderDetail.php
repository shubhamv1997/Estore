<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'user_id',
        'retailers',
        'products_detail',
        'address',
        'city',
        'pincode',
        'shipping_company',
        'tracking_id',
        'link',
        'local_pickup',
        'is_order_shipped',
        'is_order_paid',
        
        'is_order_complete',
        'is_order_reviewed',
        'user_review',
        'user_star',
        'order_date',
        'province',
        'country'
    ];
}
