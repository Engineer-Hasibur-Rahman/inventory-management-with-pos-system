<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'product_name',
        'product_quantity',
        'product_image',
        'supplier_date',
        'supplier_price',
        'supplier_unit',
        'supplier_note'
    ];
}
