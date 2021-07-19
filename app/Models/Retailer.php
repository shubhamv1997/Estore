<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Retailer extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'business_name',
        'business_address',
        'mobile_number',
        'business_phone',
        'document_name',
        'front_pic',
        'back_pic',
        'business_country',
        'business_city',
        'firstly_charges',
        'discount',
        'discount_amount',
        'monthly_charges',
        'after_discount',
        'approval',
        'block',
        'user_id'
    ];

    

    public function country()
        {
            return $this->belongsTo(Country::class);
        }

    
}
