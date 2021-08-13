<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserRegister extends Model
{
   // use HasFactory;

   use SoftDeletes;
   protected $fillable = [
       'first_name',
       'last_name',
       'mobile_number',
       'address',
       'email',
       'password',
       'id_proof',
       'status',
       'city',
       'province',
       'country',
       'postal'
   ];

}
