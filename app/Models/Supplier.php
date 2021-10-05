<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
     protected $fillable=[
        'name',
        'fathername',
        'mothername',
        'permanent_address',
        'present_address',
        'email',
        'mobile_number',
        'image',
        'username',
        'password',
        'product_name',
        'number_of_product',


    ];
}
