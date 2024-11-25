<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $table = 'product_sales';

    protected $fillable = [
        'name',
        'details',
        'price',
        'quantity'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}