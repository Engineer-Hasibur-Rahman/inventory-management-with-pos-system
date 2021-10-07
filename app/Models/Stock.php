<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
     protected $fillable=[
        'product_name',
        'product_add_date',
        'product_stock_count',
    ];
}
